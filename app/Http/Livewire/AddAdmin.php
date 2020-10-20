<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Admin;
use App\Models\City;
use Spatie\Permission\Models\Role;

class AddAdmin extends Component
{
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

    protected $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'tele' => 'required|numeric|unique:admins',
        'email' => 'required|email|unique:admins',
        'address' => 'required|string',
        'ville' => 'required|integer',
        'role' => 'required|integer',
        //'password_confirmation' => 'required|min:4',
        'password' => 'required|min:4'
    ];

    /* protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];*/

    /***
     * When load the form inject City and Role Data 
     */
    public function mount(City $city, Role $role)
    {

        $this->villes = $city::select('id', 'name')->get();
        $this->roles = $role::select('id', 'name')->get();
    }

    private function resetIput()
    {
        $this->nom = null;
        $this->prenom = null;
        $this->tele = null;
        $this->email = null;
        $this->address = null;
        $this->password = null;
        $this->nom = null;
    }

    public function submit()
    {
        $this->validate();

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
}
