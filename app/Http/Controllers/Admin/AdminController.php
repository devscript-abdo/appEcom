<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCrudRequest;
use App\Models\Admin;
use App\Models\City;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('Admin.Admins.index', ['admins' => Admin::cursor()]);
    }

    public function create()
    {
        $villes = City::select('id', 'name')->get();
        $roles = Role::cursor();
        return view('Admin.Admins.Crud.create.index', compact('villes', 'roles'));
    }

    public function store(AdminCrudRequest $request)
    {
        $admin =  Admin::create(array_merge(['city_id' => $request->ville], $request->except(['token', 'ville'])));
        $admin->assignRole($request->role);
        return $admin ? response()->noContent() : redirect()->back();
    }
}
