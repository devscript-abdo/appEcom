<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Admin;
use App\Models\Lead;
use App\Observers\AdminObserver;
use App\Observers\LeadObserver;

class ObserverModelsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Admin::observe(AdminObserver::class);
        Lead::observe(LeadObserver::class);
    }
}
