<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\player;
use Faker\Generator as Faker;

$factory->define(player::class, function (Faker $faker) {
    return [
        'name'          => $faker->name(),
        'address'       => $faker->address(),
        'description'   => $faker->text(),
        'retired'       => $faker->boolean(),
    ];
});
