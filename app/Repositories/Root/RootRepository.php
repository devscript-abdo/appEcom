<?php

namespace App\Repositories\Root;

use Livewire\ComponentConcerns\ReceivesEvents ;

class RootRepository implements RootRepositoryInterface
{
    use ReceivesEvents;

    
    public function sendNotificationToBrowser($options)
    {
      return  $this->dispatchBrowserEvent('attachedToAction', $options);
    }
    
}
