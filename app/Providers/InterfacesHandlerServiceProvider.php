<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterfacesHandlerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->when('App\Repositories\Product\ProductRepository')
            ->needs('$allowedsFilters')
            ->give(['reports', 'ok', 'Abdo']);

        $this->app->when('App\Repositories\Product\ProductCacheRepository')
            ->needs('$allowedsFilters')
            ->give(['reports', 'ok', 'Abdo']);
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
