<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Matricula;
use Faker\Generator as Faker;

$factory->define(Matricula::class, function (Faker $faker) {
    return [
        /* alumno se generará desde el seeder de Usuarios
        'alumno' => $faker->randomNumber,
        */
        'grupo' => $faker->randomNumber,
    ];
});
