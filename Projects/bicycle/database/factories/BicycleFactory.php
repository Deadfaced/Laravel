<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bicycle;
use Faker\Generator as Faker;

$factory->define(Bicycle::class, function (Faker $faker) {
    return [
        'brand' => $faker -> name(),
        'model' => $faker -> name(),
        'color' => $faker -> colorName(),
        'price' => $faker -> randomFloat(2, 0, 1000),
    ];
});
