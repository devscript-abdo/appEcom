<?php

namespace App\Providers;

use App\Policies\AdminPolicy;
use App\Policies\LeadPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       /* 'App\Models\Admin' => 'App\Policies\AdminPolicy',
        'App\Models\City' => 'App\Policies\CityPolicy',
        'App\Models\Lead' => 'App\Policies\LeadPolicy',*/
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
       // $this->registerPolicies();

        //
       /* Gate::define('update-lead', function ($user) {
            // dd($user,'Ouuuu');
            return $user->id == 2;
        });*/

       // Gate::define('update-lead', [LeaderPolicy::class, 'update']);
    }
}
