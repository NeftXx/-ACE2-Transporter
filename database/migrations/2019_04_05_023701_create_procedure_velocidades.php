<?php

use Illuminate\Database\Migrations\Migration;

class CreateProcedureVelocidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
            CREATE PROCEDURE obtener_velocidades
            AS
                SELECT * FROM (
                    SELECT top 15 id 'Recorrido', velocidad 'Velocidad'
                    FROM bitacora
                    Order by (id) DESC
                ) s
                Order by (Recorrido) ASC;
        ";

        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_velocidades;");
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_velocidades;");
    }
}
