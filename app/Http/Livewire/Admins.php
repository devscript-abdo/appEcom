<?php

namespace App\Http\Livewire;

use App\Events\LeadCreated;
use Livewire\Component;

use Illuminate\Support\Arr;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Admins extends Component
{

    use AuthorizesRequests;

    public $admins;
    public $isUpdate = false;

    public $nom;
    public $prenom;
    public $tele;
    public $email;
    public $password;
    public $address;

    public $villes;
    public $roles;

    public $ville;
    public $role;

    public $adminId;

    public function mount(
        AdminRepositoryInterface $adminRepository,
        CityRepositoryInterface $cityRepository,
        RoleRepositoryInterface $roleRepository
    ) {

            $this->villes = $cityRepository->getSelect(['id', 'name']);
            $this->roles = $roleRepository->getSelect(['id', 'name']);
            $this->admins = $adminRepository->getAll();
    }

    public function submit(AdminRepositoryInterface $newAdmin)
    {
        $this->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'tele' => 'required|numeric|unique:admins',
                'email' => 'required|email|unique:admins',
                'address' => 'required|string',
                'ville' => 'required|integer',
                'role' => 'required|integer',
                'password' => 'required|min:4'
        ]);

        $admin = $newAdmin->createWithRole($this->collectToArray());
        
        if ($admin) {
            $this->resetIput();
            
            return redirect()->route('admin.admins');
        }
    }

    public function editAdmin(AdminRepositoryInterface $Admin, $id)
    {
        $admin = $Admin->findOrFail($id);

        $this->adminId = $admin->id;

        $this->nom = $admin->nom;
        $this->prenom = $admin->prenom;
        $this->tele = $admin->tele;
        $this->email = $admin->email;
        $this->address = $admin->address;
        //$this->password = $admin->password;
        $this->ville = $admin->city_id;
        // $this->role = $admin->getRoleIds()[0] ?? 0;
        $this->isUpdate = true;
        // return view('livewire.edit-admin');
    }
    public function update(AdminRepositoryInterface $updateAdmin)
    {
        $this->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'tele' => 'required|numeric|unique:admins,tele,' . $this->adminId,
            'email' => 'required|email|unique:admins,email,' . $this->adminId,
            'address' => 'required|string',
            'ville' => 'required|integer',
        ]);

        if ($this->adminId) {

            $admin =  $updateAdmin->update($this->collectToArray('password'), $this->adminId);

            if ($admin) {
                $this->resetIput();
                return redirect()->route('admin.admins');
            }
        }
    }
    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetIput();
    }
    public function deleteAdmin(AdminRepositoryInterface $deleteAdmin, $id)
    {
        $deleteAdmin->deleteAdmin($id) ?
            redirect()->route('admin.admins')
            : null;
    }


    /**** private method ***/
    private function resetIput()
    {
        $this->nom = null;
        $this->prenom = null;
        $this->tele = null;
        $this->email = null;
        $this->address = null;
        $this->password = null;
        $this->ville = null;
        $this->role = null;
    }

    private function collectToArray($ignore = null): array
    {
        $array = [
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'tele' => $this->tele,
            'email' => $this->email,
            'address' => $this->address,
            'password' => $this->password,
            'city_id' => $this->ville,
            'role' => intval($this->role)
        ];

        if ($ignore) {

            if (Arr::exists($array, $ignore)) {
                $news = Arr::except($array, $ignore);
                return $news;
            }
        }
        return $array;
    }
}
