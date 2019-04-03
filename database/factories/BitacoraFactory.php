<?php

use App\Bitacora;
use Faker\Generator as Faker;

$factory->define(Bitacora::class, function (Faker $faker) {
    return [
        'velocidad' => rand(5, 25),
        'distancia' => rand(5, 30),
        'peso' => rand(1, 5),
        'obstaculos' => rand(0, 5),
        'tiempo_espera_obs' => 10,
        'tiempo_inicio' => rand(10, 25),
        'tiempo_fin' => rand(10, 25),
    ];
});
