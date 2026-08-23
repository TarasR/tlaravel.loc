<?php

namespace Database\Factories;

use App\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->slug,
            'price' => $this->faker->numberBetween(0, 1000000),
            'description' => $this->faker->realText,
        ];
    }
}
