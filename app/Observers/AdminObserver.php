<?php

namespace App\Observers;

use App\Models\Admin;
use App\Notifications\CreateAdminNotification;
use Illuminate\Support\Facades\Notification;

class AdminObserver
{
    /**
     * Handle the admin "created" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */

    private $admins;

    public function __construct()
    {
        $this->admins = Admin::role('user')->get();
    }

    /**
     * when admin add a new account send a Notification to other Admins
     */
    public function created(Admin $admin)
    {

       // dd($admin);
        Notification::send($this->admins, new CreateAdminNotification($admin));
    }

    /**
     * Handle the admin "updated" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function updated(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "deleted" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function deleted(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "restored" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function restored(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "force deleted" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function forceDeleted(Admin $admin)
    {
        //
    }
}
