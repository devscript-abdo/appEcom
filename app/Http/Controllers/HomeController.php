<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use App\Models\City;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    //

    public function goodP()
    {
        return view('form');
    }
    public function good(Request $request)
    {

        $request->validate([
            'email' => 'password:web'
        ]);
    }

    public function registerGet()
    {
        $villes = City::select('name', 'slug', 'id')->get();
        $roles = Role::all();
        return view('theme_a.register.index', compact('villes','roles'));
    }
    public function register(RegisterRequest $request)
    {

        $admin = new Admin();
        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->tele = $request->tele;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->password = $request->password;
        $admin->city()->associate($request->ville[0]);

        if ($admin->save()) {
            $admin->assignRole($request->role);
            return redirect()->back()->withGood('le compte a bien été Crée');
        }
        return redirect()->back()->withError('un problém a est survenu lors de la cration');
    }
}
