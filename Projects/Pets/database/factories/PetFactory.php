<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pet;
use Faker\Generator as Faker;

$factory->define(Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'color' => $faker->colorName(),
        'birthdate' => $faker->date(),
    ];
});
