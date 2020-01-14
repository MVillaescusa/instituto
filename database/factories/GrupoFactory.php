<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Grupo;
use Faker\Generator as Faker;

$factory->define(Grupo::class, function (Faker $faker) {
    return [
        //'curso' => $faker->unique()->randomNumber,
        //'letra' => $faker->randomLetter,
        //'nombre' => $faker->firstName,
        ////'tutor' => $faker->randomNumber,
        //'anyoescolar' => $faker->randomNumber,
        //'nivel' => $faker->randomNumber,
        //'verificado' => $faker->boolean($chanceOfGettingTrue = 80),

        //JAVI
        'curso' => $faker->randomNumber(),
        'letra' => $faker->randomLetter,
        'nombre' => $faker->company,
        //'tutor' => $faker->randomNumber(),
        'anyoescolar' => $faker->numberBetween($min = 1, $max = 3),
        'nivel' => $faker->unique()->randomNumber(),
        'verificado' => $faker->boolean($chanceOfGettingTrue = 80),
        'creador' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
