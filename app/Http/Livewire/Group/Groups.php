<?php

namespace App\Http\Livewire\Group;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Groups extends Component
{

    public $isUpdate = false;
    public $isLoad = false;

    public $groups;
    public $group;

    public $leads;

    public $name;
    public $description;
    public $groupId;

    public $authAdmin;

    /*  public function render()
    {
        return view('livewire.role.roles');
    }*/

    public function mount(Group $group)
    {

        $this->groups = $group::all();
        $this->authAdmin = Auth::id();
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|unique:groups',
            'description' => 'nullable|string'
        ]);

        // Execution doesn't reach here if validation fails.

        // dd($this->authAdmin);
        $group = Group::create([
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->name,
            'admin_id' => $this->authAdmin

        ]);

        if ($group) {
            $this->resetIput();
            return redirect()->route('admin.groups');
        }
    }

    public function loadData($id)
    {

        $this->group = Group::findOrFail($id);
        $this->isLoad = true;
        $this->leads = $this->group->leads()->get();
        /* return view('livewire.group.__loadData', [
            'leads' => $this->group->leads()->get()
        ]);*/
    }
    public function editGroup($id)
    {
        $group = Group::findOrFail($id);
        $this->groupId = $group->id;
        $this->name = $group->name;
        $this->description = $group->description;
        $this->isUpdate = true;
        // return view('livewire.edit-admin');
    }
    public function update()
    {
        //dd('yyyy');
        // The current user can update the post...
        $this->validate([

            'name' => 'required|string|unique:groups,name,' . $this->groupId,
        ]);


        // Execution doesn't reach here if validation fails.
        if ($this->groupId) {
            $group = Group::findOrFail($this->groupId);
            $group->update([
                'name' => $this->name,
                'description' => $this->description,

            ]);

            if ($group) {
                $this->resetIput();
                return redirect()->route('admin.groups');
            }
        }
    }
    public function deleteGroup($id)
    {
        if ($id) {
            $group = Group::findOrFail($id);
            $group->delete();
            return redirect()->route('admin.groups');
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
        $this->description = null;
    }
}
