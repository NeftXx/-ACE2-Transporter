<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Bitacora;
use Carbon\Carbon;

class BitacoraController extends Controller
{
    public function index()
    {
        return \DB::select('EXEC obtener_recorridos;');
    }

    private $messages = [
        'numeric' => 'Debe de ser un numero.',
    ];

    public function store(Request $request)
    {
        $validator = $this->validar($request);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = $validator->validate();

        if (!(array_key_exists('velocidad', $data))) {
            $data['velocidad'] = 0;
        }

        if (!(array_key_exists('peso', $data))) {
            $data['peso'] = 0;
        }

        if (!(array_key_exists('obstaculos', $data))) {
            $data['obstaculos'] = 0;
        }

        if (!(array_key_exists('tiempo_espera_obs', $data))) {
            $data['tiempo_espera_obs'] = 0;
        }

        if (!(array_key_exists('tiempo_fin', $data))) {
            $data['tiempo_fin'] = 0;
        }

        if (!(array_key_exists('tiempo_inicio', $data))) {
            $data['tiempo_inicio'] = 0;
        }

        $data['distancia'] = $data['velocidad'] * $data['tiempo_inicio'] +
                                $data['velocidad'] * $data['tiempo_fin'];

        $bitacora = Bitacora::create($data);
        return $bitacora;
    }

    public function edit(Request $request)
    {
        $bitacora = $this->getLast();

        if ($bitacora == null) {
            return 'No hay registros';
        }

        $validator = $this->validar($request);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = $validator->validate();

        if (empty($data)) {
            return $bitacora;
        }

        if (array_key_exists('velocidad', $data)) {
            $bitacora->velocidad = $data['velocidad'];
        }

        if (array_key_exists('distancia', $data)) {
            $bitacora->distancia = $data['distancia'];
        }

        if (array_key_exists('peso', $data)) {
            $bitacora->peso = $data['peso'];
        }

        if (array_key_exists('obstaculos', $data)) {
            $bitacora->obstaculos = $data['obstaculos'];
        }

        if (array_key_exists('tiempo_espera_obs', $data)) {
            $bitacora->tiempo_espera_obs = $data['tiempo_espera_obs'];
        }

        $bitacora->distancia = $bitacora->velocidad * $bitacora->tiempo_inicio + 
                                $bitacora->velocidad * $bitacora->tiempo_fin;

        $bitacora->save();

        return $bitacora;
    }

    public function terminarRecorrido(Request $request)
    {
        $bitacora = $this->getLast();

        if ($bitacora == null) {
            return 'No hay registros';
        }
        $data = $request->all();
        if ($data['tiempo_fin'] != null) {
            $bitacora->tiempo_fin = $data['tiempo_fin'];
            $bitacora->save();
        }

        return $bitacora;
    }

    public function getLast()
    {
        $bitacora = Bitacora::all();
        return $bitacora->last();
    }

    public function obtenerPromedios()
    {
        return \DB::select('EXEC obtener_promedios;');
    }

    public function obtener_ultimos_10()
    {
        return \DB::select('EXEC obtener_ultimos_10;');
    }

    public function obtener_velocidades()
    {
        return \DB::select('EXEC obtener_velocidades;');
    }

    public function calcular_distancia()
    {
        return \DB::select('EXEC calcular_distancia;');
    }

    public function obtener_distancias()
    {
        return \DB::select('EXEC obtener_distancias;');
    }

    public function validar(Request $request)
    {
        return Validator::make($request->all(), [
            'velocidad' => 'nullable|numeric',
            'distancia' => 'nullable|numeric',
            'peso' => 'nullable|numeric',
            'obstaculos' => 'nullable|numeric',
            'tiempo_espera_obs' => 'nullable|numeric',
            'tiempo_inicio' => 'nullable|numeric',
            'tiempo_fin' => 'nullable|numeric',
        ], $this->messages);
    }
}
