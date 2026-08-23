<?php

namespace Database\Factories;

use App\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->address,
        ];
    }
}
