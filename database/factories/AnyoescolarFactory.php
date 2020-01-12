<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anyoescolar;
use Faker\Generator as Faker;

$factory->define(Anyoescolar::class, function (Faker $faker) {
    return [
        'fechainicio' => $faker->dateTime($max = 'now', $timezone = null),
        'fechafinal' => $faker->dateTime($max = 'now', $timezone = null),
        //'codigo' => factory(App\Centro::class),
    ];
});





/*
AÑOSESCOLARES DE JAVI
*/
//<?php

//** @var \Illuminate\Database\Eloquent\Factory $factory */

//use App\Model;
//use Faker\Generator as Faker;

//$factory->define(Model::class, function (Faker $faker) {
//    return [
//        'fechainicio' => $faker->unique()->date,
//        'fechafinal' => $faker->unique()->date,
//        //'centro' =>  $faker->unique()->randomNumber,
//    ];
//});