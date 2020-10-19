<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

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

    public function register(RegisterRequest $request)
    {
        $admin = new Admin();
        $admin->nom = $request->nom;
        $admin->prenom = $request->prenom;
        $admin->tele = $request->tele;
        $admin->email = $request->email;
        $admin->address = $request->address;
        // $admin->city = $request->ville;
        // $admin->role = $request->role;
        $admin->password = $request->password;
        $admin->ville()->associate(1);
        if ($admin->save()) {
            return redirect()->back()->withGood('le compte a bien été Crée');
        }
        return redirect()->back()->withError('un problém a est survenu lors de la cration');
    }
}
