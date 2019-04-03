<?php

use Illuminate\Database\Migrations\Migration;

class CreateTriggerDashboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
            CREATE PROCEDURE obtener_promedios
            AS
                SELECT
                    AVG(velocidad) AS velocidad_promedio,
                    AVG(distancia) AS distancia_promedio,
                    AVG(peso) AS peso_promedio,
                    AVG(obstaculos) AS obstaculos_promedio,
                    AVG(tiempo_espera_obs) AS espera_promedio,
                    AVG(tiempo_inicio) AS inicio_promedio,
                    AVG(tiempo_fin) AS fin_promedion
                FROM bitacora;
        ";

        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_promedios;");
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_promedios;");
    }
}
