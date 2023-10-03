<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name(),
        'last_name' => $faker->name(),
        'birth_date' => $faker->date(),
        'country_id' => $faker->numberBetween(1, 4),
    ];
});
