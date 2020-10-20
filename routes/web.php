<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('theme_a.dashboard.index');
});

Route::get('/register', [HomeController::class, 'registerGet'])->name('register');
Route::post('/register', [HomeController::class, 'register'])->name('register');

Route::get('/good', [HomeController::class, 'goodP'])->name('good');
Route::post('/good', [HomeController::class, 'good'])->name('good');


/*Auth::routes();*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
