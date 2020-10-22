<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;

class AdminList extends Component
{
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
 
    public function mount(Admin $admin)
    {

        $this->admins = $admin::all();
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
        $this->password = $admin->password;
        $this->ville = $admin->city_id;

        $this->isUpdate = true;
        return view('livewire.edit-admin');
    }
    public function update()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.
        if ($this->adminId) {
            $admin = Admin::findOrFail($this->adminId);
            $admin->update([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'tele' => $this->tele,
                'email' => $this->email,
                'address' => $this->address,
                'password' => $this->password,
                'city_id' => $this->ville
            ]);
        }


        $admin->assignRole($this->role);
        if ($admin) {
            $this->resetIput();
            return redirect()->route('admin.admins');
        }
    }
    public function deleteAdmin($id)
    {
        if ($id) {
            $admin = Admin::findOrFail($id);
            $admin->delete();
            return redirect()->route('admin.admins');
        }
    }
}
