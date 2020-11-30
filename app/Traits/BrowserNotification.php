<?php

namespace App\Traits;


trait BrowserNotification
{

    protected function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
