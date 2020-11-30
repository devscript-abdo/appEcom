<?php

namespace App\Http\Livewire\Lead;

use App\Repositories\Lead\LeadRepositoryInterface;
use Livewire\Component;

class Command extends Component
{

    protected $listeners = ['makeCommand'];

    public $leadData;

    public function mount(LeadRepositoryInterface $editLead, $id)
    {
        $this->leadData = $editLead->find($id);
      
    }

    public function render()
    {
        return view('livewire.lead.command');
    }

    public function makeCommand(){
        dd('Ok from CQOMNNAD');
    }
}
