<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        return view('theme_a.roles.index', ['roles' => Role::cursor()]);
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->name]);
        return $role ? response()->noContent() : redirect()->back();
    }
}
