<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Periodoclase;
use Faker\Generator as Faker;

$factory->define(Periodoclase::class, function (Faker $faker) {
    return [
        'periodo_id' => $faker-unique()->randomNumber(),
        'materiaimpartida_id' => $faker->numberBetween($min = 1, $max = 14),
        'aula_id' => $faker->randomNumber()
    ];
});
