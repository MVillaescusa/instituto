<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Centro;
use Faker\Generator as Faker;

$factory->define(Centro::class, function (Faker $faker) {
    return [
            'codigo' => $faker->unique()->randomNumber,
            'nombre' => $faker->company,
            'web' => $faker->url,
            'verificado' => $faker->boolean($chanceOfGettingTrue = 80)
    ];
});
