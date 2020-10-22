<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DevlopperController extends Controller
{
    //

    public function truncateData()
    {
       // Schema::disableForeignKeyConstraints();
        Admin::truncate();
       // Schema::enableForeignKeyConstraints();

        $admin = new Admin();
        $admin->nom = "Elmarzougui";
        $admin->prenom = "Abdelghafour";
        $admin->tele = "0677512753";
        $admin->address = "casablanca ain chok";
        $admin->email = "abdelgha4or@gmail.com";
        $admin->password = "123456789@";
        $admin->ville()->associate(1);
        $admin->assignRole(1);
        $admin->save();
    }
}
