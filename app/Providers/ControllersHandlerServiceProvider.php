<?php

namespace App\Providers;

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use Illuminate\Support\ServiceProvider;

class ControllersHandlerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->when(AdminLoginController::class)

            ->needs('$appGuard')
            ->give($this->app->make('config')->get('auth.authUser'));

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
