<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\player;
use Faker\Generator as Faker;

$factory->define(player::class, function (Faker $faker) {
    return [
        'id'          => $faker->id(),
        'name'       => $faker->name(),
        'timestamps'   => $faker->timestamps(),
    ];
});
