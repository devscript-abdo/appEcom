<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

/*** Admin Login */

Route::group(['prefix' => env('ADMIN_DASH_PREFIX')], function () {

    Route::get('/appLogin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/appLogin', [AdminLoginController::class, 'login'])->name('admin.login')
        ->middleware('throttle:3,1');
});

/*** End Admin Login */
