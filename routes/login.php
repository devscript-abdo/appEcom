<?php

use App\Http\Controllers\Delivery\Auth\DeliveryLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

/*** Admin Login */

Route::group(['prefix' => env('ADMIN_DASH_PREFIX')], function () {

    Route::get('/appLogin', [AdminLoginController::class, 'showLoginForm'])->name('admin.loginGet');
    Route::post('/appLogin', [AdminLoginController::class, 'login'])->name('admin.login');
       // ->middleware('throttle:3,1');
});

/*** End Admin Login */

/*** Login Delivery ***/

Route::group(['prefix' => env('DILEVERY_DASH_PREFIX')], function () {

    Route::get('/login', [DeliveryLoginController::class, 'showLoginForm'])->name('delivery.Get');
    Route::post('/login', [DeliveryLoginController::class, 'login'])->name('delivery.login');
    // ->middleware('throttle:3,1');
});

/*** End Login Delivery ***/
