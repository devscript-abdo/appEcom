<?php

namespace App\Http\Livewire\Group;

use Livewire\Component;
use Livewire\WithPagination;

class Single extends Component
{
    use WithPagination;

    public $group;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        //dd($this->group);
        return view('livewire.group.single', [
            /*'leads' => $this->readyToLoad
                ? $this->group->leads()->get()
                : [],*/

            'leads' => $this->group->leads()->get()->paginate(10)

        ]);
    }

}
