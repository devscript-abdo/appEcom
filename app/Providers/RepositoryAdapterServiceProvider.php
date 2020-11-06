<?php

namespace App\Providers;
use App\Exceptions\DataSourceException;
use App\Models\Admin;
use App\Repositories\Admin\AdminCacheRepository;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Cache\CacheManager;

use Illuminate\Support\ServiceProvider;

class RepositoryAdapterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AdminRepositoryInterface::class, function ($app) {
       
            switch ($app->make('config')->get('haymacproduction.get-dataType')) {
                
                case 'useCache':
                    return new AdminCacheRepository(new CacheManager($app), new AdminRepository(new Admin()));
                case 'useDataBase':
                    return new AdminRepository(new Admin());
                default:
                    throw new DataSourceException("Unknown Stock Checker Service");
            }
        });

        $this->app->bind(
            'App\Repositories\Lead\LeadRepositoryInterface',
            'App\Repositories\Lead\LeadRepository'
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
