<?php

Route::get('bitacora', 'BitacoraController@index')->name('bitacora_get');
Route::get('nuevo-recorrido', 'BitacoraController@store');
Route::get('editar-recorrido', 'BitacoraController@edit');
Route::get('terminar-recorrido', 'BitacoraController@terminarRecorrido');
Route::get('recorrido-actual', 'BitacoraController@getLast');
Route::get('promedios', 'BitacoraController@obtenerPromedios');
Route::get('ultimos-tiempos', 'BitacoraController@obtener_ultimos_10');
Route::get('velocidades', 'BitacoraController@obtener_velocidades');
Route::get('distancia-total', 'BitacoraController@calcular_distancia');
Route::get('distancias', 'BitacoraController@obtener_distancias');