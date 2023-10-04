<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title'=> $faker->name,
        'year'=> $faker->year,
        'released'=> $faker->date,
        'runtime'=> $faker->time,
        'director'=> $faker->name,
        'imdb_votes'=> $faker->numberBetween(1, 100),
    ];
});
