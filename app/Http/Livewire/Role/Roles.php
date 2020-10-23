<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $roles;
    public $isUpdate = false;

    public $name;
    public $roleId;

    /*  public function render()
    {
        return view('livewire.role.roles');
    }*/

    public function mount(Role $role)
    {

        $this->roles = $role::all();
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|unique:roles',
        ]);

        // Execution doesn't reach here if validation fails.

        $role = Role::create([
            'name' => $this->name,
        ]);

        if ($role) {
            $this->resetIput();
            return redirect()->route('admin.roles');
        }
    }


    public function editRole($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $role->id;
        $this->name = $role->name;

        $this->isUpdate = true;
        // return view('livewire.edit-admin');
    }
    public function update()
    {
        //dd('yyyy');
        // The current user can update the post...
        $this->validate([

            'name' => 'required|string|unique:roles,name,' . $this->roleId,
        ]);
       

        // Execution doesn't reach here if validation fails.
        if ($this->roleId) {
            $role = Role::findOrFail($this->roleId);
            $role->update([
                'name' => $this->name,

            ]);

            if ($role) {
                $this->resetIput();
                return redirect()->route('admin.roles');
            }
        }
    }
    public function deleteRole($id)
    {
        if ($id) {
            $role = Role::findOrFail($id);
            $role->delete();
            return redirect()->route('admin.roles');
        }
    }

    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetIput();
    }

    /**** private method ***/
    private function resetIput()
    {
        $this->name = null;
    }
}
