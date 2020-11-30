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

            switch ($app->make('config')->get('haymacproduction.getFrom')) {

                case 'cache':

                    return new AdminCacheRepository(app(CacheManager::class),app(AdminRepository::class));
                case 'database':

                    return new AdminRepository(app(Admin::class));

                default:
                    throw new DataSourceException("Unknown Stock Checker Service");
            }
        });

        $this->app->bind(
            'App\Repositories\LoggedGuard\LoggedGuardRepositoryInterface',
            'App\Repositories\LoggedGuard\LoggedGuardRepository'
        );


        $this->app->bind(
            'App\Repositories\Moderator\ModeratorRepositoryInterface',
            //'App\Repositories\Moderator\ModeratorRepository',
            'App\Repositories\Moderator\ModeratorCacheRepository'
        );

        $this->app->bind(
            'App\Repositories\Lead\LeadRepositoryInterface',
            'App\Repositories\Lead\LeadRepository'
        );

        $this->app->bind(
            'App\Repositories\Category\CategoryRepositoryInterface',
            'App\Repositories\Category\CategoryCacheRepository'
        );

        $this->app->bind(
            'App\Repositories\Product\ProductRepositoryInterface',
            'App\Repositories\Product\ProductRepository'
        );

        $this->app->bind(
            'App\Repositories\Group\GroupRepositoryInterface',
            //'App\Repositories\Group\GroupRepository',
            'App\Repositories\Group\GroupCacheRepository'
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



    private $repositories = [
        [
           'abstract' => "App\Repositories\LoggedGuard\LoggedGuardRepositoryInterface",
            'concrete'=>"App\Repositories\LoggedGuard\LoggedGuardRepository"
        ],
        [
            'abstract' => "App\Repositories\Moderator\ModeratorRepositoryInterface",
            'concrete'=>"App\Repositories\Moderator\ModeratorRepository"
        ],
        [
            'abstract' => "App\Repositories\Lead\LeadRepositoryInterface",
            'concrete'=>"App\Repositories\Lead\LeadRepository"
        ],
        [
            'abstract' => "App\Repositories\Category\CategoryRepositoryInterface",
            'concrete'=>"App\Repositories\Category\CategoryRepository"
        ],
        [
            'abstract' => "App\Repositories\Product\ProductRepositoryInterface",
            'concrete'=>"App\Repositories\Product\ProductRepository"
        ],
        [
            'abstract' => "App\Repositories\Group\GroupRepositoryInterface",
            'concrete'=>"App\Repositories\Group\GroupCacheRepository"
        ],
        [
            'abstract' => "App\Repositories\City\CityRepositoryInterface",
            'concrete'=>"App\Repositories\City\CityRepository"
        ],
        [
            'abstract' => "App\Repositories\Role\RoleRepositoryInterface",
            'concrete'=>"App\Repositories\Role\RoleRepository"
        ],
    ];
}
