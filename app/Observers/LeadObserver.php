<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\Lead;
use App\Notifications\LeadNotification;
use Illuminate\Support\Facades\Notification;

class LeadObserver
{

    private $admins;

    public function __construct()
    {
       $this->admins = Admin::role('super-admin')->get();
    }
    /**
     * Handle the lead "created" event.
     *
     * @param  \App\Models\Lead  $lead
     * @return void
     */
    public function created(Lead $lead)
    {

       // Notification::send($this->admins, new LeadNotification($lead,'created'));
    }

    /**
     * Handle the lead "updated" event.
     *
     * @param  \App\Models\Lead  $lead
     * @return void
     */
    public function updated(Lead $lead)
    {
        //
      
       // Notification::send($this->admins, new LeadNotification($lead));
    }

    /**
     * Handle the lead "deleted" event.
     *
     * @param  \App\Models\Lead  $lead
     * @return void
     */
    public function deleted(Lead $lead)
    {
        //
    }

    /**
     * Handle the lead "restored" event.
     *
     * @param  \App\Models\Lead  $lead
     * @return void
     */
    public function restored(Lead $lead)
    {
        //
    }

    /**
     * Handle the lead "force deleted" event.
     *
     * @param  \App\Models\Lead  $lead
     * @return void
     */
    public function forceDeleted(Lead $lead)
    {
        //
    }
}
