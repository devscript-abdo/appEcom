<?php

namespace App\Providers;

use App\Policies\AdminPolicy;
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
        'App\Models\Admin' => 'App\Policies\AdminPolicy',
        'App\Models\City' => 'App\Policies\CityPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
       /* Gate::define('update', function ($user) {
            //  dd($user);
            return $user->id == 3;
        });*/

        Gate::define('update', [AdminPolicy::class, 'update']);
    }
}
