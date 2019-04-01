<?php

use Faker\Generator as Faker;
//use \App\Country;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique->address,
    ];
});
