<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;


class CityController extends Controller
{
    //

    public function index()
    {
        return view('Admin.City.index', ['cities' => City::cursor()]);
    }

    public function store(CityRequest $request)
    {

        $city = City::create(['name' => $request->name, 'slug' => $request->name]);
        
        return $city ? response()->noContent() : redirect()->back();
    }
}
