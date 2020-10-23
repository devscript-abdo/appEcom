<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Admin;
use App\Models\City;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Admins extends Component
{

    use AuthorizesRequests;
    /*public function render()
    {
        return view('livewire.admins');
    }*/
    /*
    public function render()
    {
        return view('livewire.admin-list');
    }*/
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

    public function mount(Admin $admin, City $city, Role $role)
    {
        $this->villes = $city::select('id', 'name')->get();
        $this->roles = $role::select('id', 'name')->get();
        $this->admins = $admin::all();
    }


    /* protected $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'tele' => 'required|numeric|unique:admins,tele,' . $this->adminId,
        'email' => 'required|email|unique:admins,email,' . $this->adminId,
        'address' => 'required|string',
        'ville' => 'required|integer',
        'role' => 'required|integer',
        //'password_confirmation' => 'required|min:4',
        'password' => 'required|min:4'
    ];*/

    public function submit()
    {
        $this->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'tele' => 'required|numeric|unique:admins',
            'email' => 'required|email|unique:admins',
            'address' => 'required|string',
            'ville' => 'required|integer',
            'role' => 'required|integer',
           // 'password_confirmation' => 'required|min:4',
            'password' => 'required|min:4'
        ]);

        // Execution doesn't reach here if validation fails.

        $admin = Admin::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'tele' => $this->tele,
            'email' => $this->email,
            'address' => $this->address,
            'password' => $this->password,
            'city_id' => $this->ville
        ]);
        $admin->assignRole($this->role);
        if ($admin) {
            $this->resetIput();
            return redirect()->route('admin.admins');
        }
    }

    public function editAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $this->adminId = $admin->id;
        $this->nom = $admin->nom;
        $this->prenom = $admin->prenom;
        $this->tele = $admin->tele;
        $this->email = $admin->email;
        $this->address = $admin->address;
        //$this->password = $admin->password;
        $this->ville = $admin->city_id;
        // $this->role = $admin->getRoleNames()[0];
        $this->isUpdate = true;
        // return view('livewire.edit-admin');
    }
    public function update()
    {
        // $this->authorize('update', $this->adminId);

        // The current user can update the post...
        $this->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'tele' => 'required|numeric|unique:admins,tele,' . $this->adminId,
            'email' => 'required|email|unique:admins,email,' . $this->adminId,
            'address' => 'required|string',
            'ville' => 'required|integer',
            'role' => 'required|integer',
            //'password_confirmation' => 'required|min:4',
            // 'password' => 'required|min:4'
        ]);

        // Execution doesn't reach here if validation fails.
        if ($this->adminId) {
            $admin = Admin::findOrFail($this->adminId);
            $admin->update([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'tele' => $this->tele,
                'email' => $this->email,
                'address' => $this->address,
                // 'password' => $this->password,
                'city_id' => $this->ville
            ]);
            $admin->assignRole($this->role);
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
    public function deleteAdmin($id)
    {
        if ($id) {
            $admin = Admin::findOrFail($id);
            $admin->delete();
            return redirect()->route('admin.admins');
        }
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
}
