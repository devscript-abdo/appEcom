<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //

    public function index()
    {
        return view('theme_a.account._livewire.index', ['admin' => Admin::find(Auth::id())]);
    }

    public function update()
    {
    }
}
