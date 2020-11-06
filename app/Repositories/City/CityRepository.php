<?php

namespace App\Repositories\City;

use App\Models\City;

class CityRepository implements CityRepositoryInterface
{


    public function getAll()
    {
        return City::all();
    }

    public function getCity($id)
    {
        return City::findOrFail($id);
    }
    public function getSelect(array $attributes)
    {
        return City::select($attributes)->get();
    }
}
