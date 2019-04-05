<?php

use App\Bitacora;
use Faker\Generator as Faker;

$factory->define(Bitacora::class, function (Faker $faker) {
    $velocidad = rand(5, 25);
    $tiempo_inicio = rand(10, 25);
    $tiempo_fin = rand(10, 25);
    $distancia = $velocidad * $tiempo_inicio + $velocidad * $tiempo_fin;
    return [
        'velocidad' => $velocidad,
        'distancia' => $distancia,
        'peso' => rand(0.1, 2),
        'obstaculos' => rand(0, 5),
        'tiempo_espera_obs' => rand(10, 30),
        'tiempo_inicio' => $tiempo_inicio,
        'tiempo_fin' => $tiempo_fin,
    ];
});
