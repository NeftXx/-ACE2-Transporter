<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacora';
    public $timestamps = false;
    protected $fillable = array(
        'velocidad','distancia', 'peso', 'obstaculos',
        'tiempo_espera_obs', 'tiempo_inicio', 'tiempo_fin'
    );
}
