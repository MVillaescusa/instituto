<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Aula;
use Faker\Generator as Faker;

$factory->define(Aula::class, function (Faker $faker) {
    return [
        'numero' => $faker->randomNumber,
        'nombre' => $faker->randomNumber,
        'edificio' => $faker->secondaryAddress,
        'planta' => $faker->buildingNumber,
        'centro_id' => $faker->numberBetween($min = 1, $max = 4)
    ];
});
