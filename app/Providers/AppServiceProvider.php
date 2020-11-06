<?php

namespace App\Providers;

use App\Models\Admin;
use App\Observers\AdminObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // Schema::enableForeignKeyConstraints();
        Schema::disableForeignKeyConstraints();
        Admin::observe(AdminObserver::class);
    }
}
