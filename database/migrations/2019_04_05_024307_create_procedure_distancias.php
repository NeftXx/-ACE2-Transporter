<?php

use Illuminate\Database\Migrations\Migration;

class CreateProcedureDistancias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
            CREATE PROCEDURE obtener_distancias
            AS
                SELECT id, distancia
                FROM bitacora;
        ";

        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_distancias;");
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_distancias;");
    }
}
