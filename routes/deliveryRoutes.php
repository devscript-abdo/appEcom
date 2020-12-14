<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 02/décembre/2020
 **/

use App\Http\Controllers\Delivery\DashboradController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth:delivery']
], function () {

    Route::get('/',[DashboradController::class,'index'])->name('dash');

    Route::get('/commands',[DashboradController::class,'commands'])->name('commands');

});
