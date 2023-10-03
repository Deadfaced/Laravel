<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'Name' => $faker->name(),
        'Details' => $faker->text(50),
        'id_category' => $faker->unique()->numberBetween('1', '4'),
    ];

});
