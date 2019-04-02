<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Bitacora;
use Carbon\Carbon;

class BitacoraController extends Controller
{
    public function index() {
        return Bitacora::all();
    }

    private $messages = [
        'numeric' => 'Debe de ser un numero.',
    ];

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'velocidad' => 'nullable|numeric',
            'distancia' => 'nullable|numeric',
            'peso' => 'nullable|numeric',
            'obstaculos' => 'nullable|numeric',
            'tiempo_espera_obs' => 'nullable|numeric',
        ], $this->messages);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = $validator->validate();

        if (empty($data)) {
            $data['velocidad'] = 0;
            $data['distancia'] = 0;
            $data['peso'] = 0;
            $data['obstaculos'] = 0;
            $data['tiempo_espera_obs'] = 0;
        }

        $bitacora = Bitacora::create($data);
        return $bitacora;
    }

    public function edit(Request $request) {
        $bitacora = $this->getLast();       
        
        if ($bitacora == null) {
            return 'No hay registros';
        }

        $validator = Validator::make($request->all(), [
            'velocidad' => 'nullable|numeric',
            'distancia' => 'nullable|numeric',
            'peso' => 'nullable|numeric',
            'obstaculos' => 'nullable|numeric',
            'tiempo_espera_obs' => 'nullable|numeric',
        ], $this->messages);

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

        $bitacora->save();

        return $bitacora;
    }

    public function terminarRecorrido() {
        $bitacora = $this->getLast();       
        
        if ($bitacora == null) {
            return 'No hay registros';
        }

        $bitacora->fin = Carbon::now()->toDateTimeString();

        $bitacora->save();
        
        return $bitacora;
    }

    public function getLast() {
        $bitacora = Bitacora::all();
        return $bitacora->last();
    }
}
