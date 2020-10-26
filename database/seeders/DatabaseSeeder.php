<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\City::factory(3)->create();
        //  \App\Models\User::factory(10)->create();
        \App\Models\Lead::factory(200)->create();
       /* \App\Models\Admin::factory()
            ->count(3)
            ->forVille([
                'name' => 'Casablanca',
                'slug' => 'Casablanca city'
            ])
            ->create();*/
    }
}
