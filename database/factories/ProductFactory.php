<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            //'slug' => $this->faker->slug(),
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->numberBetween(50, 980),
            'price' => $this->faker->numberBetween(50, 1500),
            'category_id' => $this->faker->numberBetween(1, 4),
            'admin_id' => 1,
        ];
    }
}
