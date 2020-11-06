<?php

namespace App\Http\Livewire\Moderator;

use App\Models\City;
use App\Models\Moderator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Moderators extends Component
{
    public $moderators;
    public $isUpdate = false;

    public $nom;
    public $prenom;
    public $tele;
    public $email;
    public $password;
    public $address;

    public $villes;
    //public $roles;

    public $ville;
    //public $role;
    public $adminAuth;
    public $moderatorId;

    public function mount(Moderator $moderator, City $city)
    {
        $this->villes = $city::select('id', 'name')->get();
       // $this->roles = $role::select('id', 'name')->get();
        $this->moderators = $moderator::all();
        $this->adminAuth = Auth::user();
    }

    public function submit()
    {
       // dd($this->adminAuth->fullname);
        $this->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'tele' => 'required|numeric|unique:moderators',
            'email' => 'required|email|unique:moderators',
            'address' => 'required|string',
            'ville' => 'required|integer',
            //'role' => 'required|integer',
            // 'password_confirmation' => 'required|min:4',
            'password' => 'required|min:4'
        ]);

        // Execution doesn't reach here if validation fails.
       
        $user = Moderator::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'tele' => $this->tele,
            'email' => $this->email,
            'address' => $this->address,
            'password' => $this->password,
            'city_id' => $this->ville,
            'addedBy'=>$this->adminAuth->fullname
        ]);
        //$user->assignRole($this->role);
        if ($user) {
            $this->resetIput();
            return redirect()->route('admin.moderators');
        }
    }

    public function editModerator($id)
    {
        $user = Moderator::findOrFail($id);
        $this->moderatorId = $user->id;
        $this->nom = $user->nom;
        $this->prenom = $user->prenom;
        $this->tele = $user->tele;
        $this->email = $user->email;
        $this->address = $user->address;
        //$this->password = $admin->password;
        $this->ville = $user->city_id;
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
            'tele' => 'required|numeric|unique:moderators,tele,' . $this->moderatorId,
            'email' => 'required|email|unique:moderators,email,' . $this->moderatorId,
            'address' => 'required|string',
            'ville' => 'required|integer',
            //'role' => 'required|integer',
            //'password_confirmation' => 'required|min:4',
            // 'password' => 'required|min:4'
        ]);

        // Execution doesn't reach here if validation fails.
        if ($this->moderatorId) {
            $user = Moderator::findOrFail($this->moderatorId);
            $user->update([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'tele' => $this->tele,
                'email' => $this->email,
                'address' => $this->address,
                // 'password' => $this->password,
                'city_id' => $this->ville
            ]);
           // $user->assignRole($this->role);
            if ($user) {
                $this->resetIput();
                return redirect()->route('admin.moderators');
            }
        }
    }
    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetIput();
    }
    public function deleteModerator($id)
    {
        if ($id) {
            $admin = Moderator::findOrFail($id);
            $admin->delete();
            return redirect()->route('admin.moderators');
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
        //$this->role = null;
    }
}
