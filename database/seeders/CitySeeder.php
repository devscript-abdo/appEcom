<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $cities = [

        ['name' => 'casablanca', 'slug' => 'casablanca'],
        ['name' => 'rabat', 'slug' => 'rabat'],
        ['name' => 'tanger', 'slug' => 'tanger'],
        ['name' => 'marrakech', 'slug' => 'marrakech'],

    ];

    public function run()
    {
        foreach ($this->cities as $index => $city) {
            $result = City::create($city);
            if (!$result) {
                $this->command->info("Insert failed at citiy $index.");
                return;
            }
        }
        $this->command->info('Inserted ' . count($this->cities) . ' cities');
    }
}
