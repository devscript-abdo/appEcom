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
        /*$this->app->bind(
            'App\Repositories\Root\RootRepositoryInterface',
            'App\Repositories\Root\RootRepository'
        );*/

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
            'App\Repositories\Moderator\ModeratorRepository',
            //'App\Repositories\Moderator\ModeratorCacheRepository'
        );
        $this->app->bind(
            'App\Repositories\Delivery\DeliveryRepositoryInterface',
            'App\Repositories\Delivery\DeliveryRepository',

        );
        $this->app->bind(
            'App\Repositories\Lead\LeadRepositoryInterface',
            'App\Repositories\Lead\LeadRepository'
        );

        $this->app->bind(
            'App\Repositories\Category\CategoryRepositoryInterface',
            'App\Repositories\Category\CategoryRepository',
           // 'App\Repositories\Category\CategoryCacheRepository'
        );

        $this->app->bind(
            'App\Repositories\Product\ProductRepositoryInterface',
            'App\Repositories\Product\ProductRepository',
            //'App\Repositories\Product\ProductCacheRepository',
        );

        $this->app->bind(
            'App\Repositories\Group\GroupRepositoryInterface',
            'App\Repositories\Group\GroupRepository',
            //'App\Repositories\Group\GroupCacheRepository'
        );

        $this->app->bind(
            'App\Repositories\City\CityRepositoryInterface',
            'App\Repositories\City\CityRepository'
        );

        $this->app->bind(
            'App\Repositories\Role\RoleRepositoryInterface',
            'App\Repositories\Role\RoleRepository'
        );

        $this->app->bind(
            'App\Repositories\Treasury\TreasuryRepositoryInterface',
            'App\Repositories\Treasury\TreasuryRepository'
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
