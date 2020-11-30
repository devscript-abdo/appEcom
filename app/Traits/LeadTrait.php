<?php

namespace App\Traits;


trait LeadTrait
{

    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
