<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        return view('theme_a.admins._livewire.index');

    }

    public function create()
    {

    }

    public function store()
    {

    }
}
