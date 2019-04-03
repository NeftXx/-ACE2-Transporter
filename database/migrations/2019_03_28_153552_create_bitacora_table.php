<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('velocidad', 8, 2)->default(0);
            $table->double('distancia', 8, 2)->default(0);
            $table->double('peso', 8, 2)->default(0);
            $table->integer('obstaculos')->default(0);
            $table->integer('tiempo_espera_obs')->default(0);
            $table->integer('tiempo_inicio')->default(0);
            $table->integer('tiempo_fin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora');
    }
}
