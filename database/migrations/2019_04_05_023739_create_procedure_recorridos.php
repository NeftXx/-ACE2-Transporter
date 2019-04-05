<?php

use Illuminate\Database\Migrations\Migration;

class CreateProcedureRecorridos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
            CREATE PROCEDURE obtener_recorridos
            AS
                SELECT 
                    id Recorrido, velocidad 'Velocidad (cm/s)',
                    distancia 'Distancia (cm)', peso 'Peso (libras)',
                    obstaculos 'Obstaculos', tiempo_espera_obs 'Tiempor de espera (seg)',
                    tiempo_inicio 'Tiempo de Inicio(seg)', tiempo_fin 'Tiempo de Fin (seg)'
                FROM bitacora;
        ";

        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_recorridos;");
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_recorridos;");
    }
}
