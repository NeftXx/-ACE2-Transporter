<?php

use Illuminate\Database\Migrations\Migration;

class CreateProcedureTotalDistancia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
            CREATE PROCEDURE calcular_distancia
            AS
                SELECT SUM(distancia) Distancia
                FROM bitacora;
        ";

        DB::unprepared("DROP PROCEDURE IF EXISTS calcular_distancia;");
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS calcular_distancia;");
    }
}
