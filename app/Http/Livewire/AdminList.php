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

    public function mount(Admin $admin)
    {

        $this->admins = $admin::all();
    }
}
