<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Materiaimpartida;
use Faker\Generator as Faker;

$factory->define(Materiaimpartida::class, function (Faker $faker) {
    return [
        //TODO relacion con tablas materia, grupo y usuario
        //Hasta que esté hecha la relación creamos valores aleatorios
        'docente' => $faker->randomNumber,
        'grupo' => $faker->randomNumber,
        'materia' => $faker->randomNumber
    ];
});
