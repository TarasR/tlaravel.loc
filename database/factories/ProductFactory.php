<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        // 'name' => $faker->unique->address,
        'title' => $faker->word, 
        'slug' => $faker->slug, 
        'price' => $faker->numberBetween(0,1000000), 
        'description' => $faker->realText,
    ];
});
