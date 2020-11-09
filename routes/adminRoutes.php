<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AccountController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\DevlopperController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TodoController;

Route::group([

    // 'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth:admin,moderator']

], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dash');

    Route::group(['prefix' => 'account', 'middleware' => ['role:super-admin|human-resource']], function () {

        Route::get('/', [AccountController::class, 'index'])->name('account');
    });

    Route::group(['prefix' => 'admins', 'middleware' => ['role:super-admin']], function () {

        Route::get('/', [AdminController::class, 'index'])->name('admins');
        Route::get('/add', [AdminController::class, 'create'])->name('admins.add');
        Route::post('/add', [AdminController::class, 'store'])->name('admins.add');
    });

    Route::group(['prefix' => 'roles', 'middleware' => ['role:super-admin|human-resource']], function () {

        Route::get('/', [RoleController::class, 'index'])->name('roles');
        Route::post('/', [RoleController::class, 'store'])->name('roles');
    });

    Route::group(['prefix' => 'cities', 'middleware' => ['role:super-admin']], function () {
        Route::get('/', [CityController::class, 'index'])->name('cities');
        Route::post('/', [CityController::class, 'store'])->name('cities');
    });

    Route::group(['prefix' => 'groups'], function () {
        Route::get('/', [GroupController::class, 'index'])->name('groups');
        Route::get('/single/{group}', [GroupController::class, 'show'])->name('groups.single');
        Route::post('/', [GroupController::class, 'store'])->name('groups');
    });


    Route::group(['prefix' => 'leads'], function () {
        Route::get('/', [LeadController::class, 'index'])->name('leads');
        Route::post('/', [LeadController::class, 'store'])->name('leads');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::post('/', [ProductController::class, 'store'])->name('products');
    });

    Route::group(['prefix' => 'moderators'], function () {
        Route::get('/', [ModeratorController::class, 'index'])->name('moderators');
        Route::post('/', [ModeratorController::class, 'store'])->name('moderators');
    });

    Route::group(['prefix' => 'todos'], function () {
        Route::get('/', [TodoController::class, 'index'])->name('todos');
        Route::post('/', [TodoController::class, 'store'])->name('todos');
    });

    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');


    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings');
        Route::post('/', [SettingController::class, 'update'])->name('settings');
    });

    Route::group(['prefix' => 'devlopper'], function () {
        Route::get('/truncate', [DevlopperController::class, 'truncateData'])->name('truncate');
    });
});
/*
Route::get('/confirm-password', function () {
    return view('Admin.Home.index');
})->middleware(['auth:admin'])->name('password.confirm');
*/