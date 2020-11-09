<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->bind(
            'App\Repositories\LoggedGuard\LoggedGuardRepositoryInterface',
            'App\Repositories\LoggedGuard\LoggedGuardRepository'
        );

        $this->app->bind(
            'App\Repositories\Admin\AdminRepositoryInterface',
            'App\Repositories\Admin\AdminRepository'
        );

        $this->app->bind(
            'App\Repositories\Moderator\ModeratorRepositoryInterface',
            'App\Repositories\Moderator\ModeratorRepository'
        );

        $this->app->bind(
            'App\Repositories\Lead\LeadRepositoryInterface',
            'App\Repositories\Lead\LeadRepository'
        );

        $this->app->bind(
            'App\Repositories\Category\CategoryRepositoryInterface',
            'App\Repositories\Category\CategoryRepository'
        );

        $this->app->bind(
            'App\Repositories\Product\ProductRepositoryInterface',
            'App\Repositories\Product\ProductRepository'
        );

        $this->app->bind(
            'App\Repositories\Group\GroupRepositoryInterface',
            'App\Repositories\Group\GroupRepository'
        );

        $this->app->bind(
            'App\Repositories\City\CityRepositoryInterface',
            'App\Repositories\City\CityRepository'
        );

        $this->app->bind(
            'App\Repositories\Role\RoleRepositoryInterface',
            'App\Repositories\Role\RoleRepository'
        );
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
