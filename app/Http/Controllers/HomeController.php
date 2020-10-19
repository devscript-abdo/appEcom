<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function goodP(){
        return view('form');
    }
    public function good(Request $request){

        $request->validate([
            'email' => 'password:web'
        ]);
    }
}
