<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Man;
use Faker\Generator as Faker;

$factory->define(Man::class, function (Faker $faker) {

    return [
        'name'   => $faker->name,
        'city'   => $faker->city,
        'age'    => $faker->numberBetween(15, 60),
        'number' => $faker->regexify('/09(1[0-9]|3[1-9]|2[1-9])[0-9]{3}[0-9]{4}/'),
        'status' => $faker->randomElement(['active' , 'inactive']),
        ];
});
