<?php

namespace App\Providers;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
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
        
        Paginator::useBootstrap();

        /* DB::listen(function ($query) {
            // $query->sql
            // $query->bindings
            // $query->time
        });*/
   
    }
}
