<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bitacora', 'BitacoraController@index')
        ->name('bitacora_get');

Route::get('insertar', 'BitacoraController@store');

Route::get('editar', 'BitacoraController@edit');

Route::get('terminar-recorrido', 'BitacoraController@terminarRecorrido');

Route::get('ultimo', 'BitacoraController@getLast');