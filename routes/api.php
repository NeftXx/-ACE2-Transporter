<?php

Route::get('bitacora', 'BitacoraController@index')
        ->name('bitacora_get');

Route::get('nuevo-recorrido', 'BitacoraController@store');

Route::get('editar-recorrido', 'BitacoraController@edit');

Route::get('terminar-recorrido', 'BitacoraController@terminarRecorrido');

Route::get('recorrido-actual', 'BitacoraController@getLast');

Route::get('promedios', 'BitacoraController@obtenerPromedios');