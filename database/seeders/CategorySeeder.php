<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $categories = [

        ['name' => 'produits solaires', 'slug' => 'produits-solaires','type'=>'products'],
        ['name' => 'produits antirides', 'slug' => 'produits-antirides','type'=>'products'],
        ['name' => 'masques de beauté', 'slug' => 'masques-de-beaute','type'=>'products'],
        ['name' => 'produits de mise en plis', 'slug' => 'produits-de-mise-en-plis','type'=>'products'],

    ];

    public function run()
    {
        foreach ($this->categories as $index => $category) {
            $result = Category::create($category);
            if (!$result) {
                $this->command->info("Insert failed at category $index.");
                return;
            }
        }
        $this->command->info('Inserted ' . count($this->categories) . ' categories');
    }
}
