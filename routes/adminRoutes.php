<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AccountController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;

Route::group([

    // 'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth:admin']

], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dash');
    Route::get('/account', [AccountController::class, 'index'])->name('account');

    Route::group(['prefix' => 'admins'], function () {

        Route::get('/', [AdminController::class, 'index'])->name('admins');
        Route::get('/add', [AdminController::class, 'create'])->name('admins.add');
        Route::post('/add', [AdminController::class, 'store'])->name('admins.add');
        
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles');
        Route::post('/', [RoleController::class, 'store'])->name('roles');
    });

    Route::group(['prefix' => 'cities'], function () {
        Route::get('/', [CityController::class, 'index'])->name('cities');
        Route::post('/', [CityController::class, 'store'])->name('cities');
    });
});
/*
Route::get('/confirm-password', function () {
    return view('Admin.Home.index');
})->middleware(['auth:admin'])->name('password.confirm');
*/