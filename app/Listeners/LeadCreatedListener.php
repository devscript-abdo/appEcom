<?php

namespace App\Listeners;

use App\Events\LeadCreated;
use App\Notifications\LeadNotification;
use App\Repositories\LoggedGuard\LoggedGuardRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class LeadCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LeadCreated $event)
    {
   //  dd($event);
      // Notification::send(Auth::user(),new LeadNotification($event));
       Notification::route('mail', 'abdo@gmail.com')->notify(new LeadNotification($event,''));
        
    }
}
