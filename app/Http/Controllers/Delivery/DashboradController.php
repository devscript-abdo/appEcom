<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:delivery');
    }

    public function index(){

        return view('theme_a.__dileveryInterface.home.index');
    }

    public function commands(){
        return view('theme_a.__dileveryInterface.commands._livewire.index');
    }
}
