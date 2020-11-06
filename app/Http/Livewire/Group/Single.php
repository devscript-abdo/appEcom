<?php

namespace App\Http\Livewire\Group;

use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;

class Single extends Component
{
    use WithPagination;
    
    public $group;
    //public $readyToLoad = false;


    /* public function loadData()
    {
        $this->readyToLoad = true;
    }*/

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

    public function edit($id)
    {
        $lead = Lead::find($id);
        $this->lead = $lead;
        $this->emit('editLead', $lead->id);
    }
}
