<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    //

    public function postHook(Request $request){

        Log::info($request);
    }

    public function tester(){
        function getName(): string{
            return app(App\Settings\GeneralSettings::class)->site_name;
        }
    }
}
