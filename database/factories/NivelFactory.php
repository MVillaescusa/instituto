<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Nivel;
use Faker\Generator as Faker;

$factory->define(Nivel::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company
    ];
});
