<?php

namespace App\Traits;


use Livewire\Component ;

class dispatchBrowserEvent extends Component
{

    public function sendNofiticationToBrowser($name, $options = [])
    {
     //  dd($name,$options);
        $this->dispatchBrowserEvent($name, $options);
    }
}
