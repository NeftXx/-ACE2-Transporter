<?php

use Illuminate\Database\Migrations\Migration;

class CreateProcedureUltimos10 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
            CREATE PROCEDURE obtener_ultimos_10
            AS
                SELECT * FROM (
                    SELECT top 15 id 'Recorrido', tiempo_fin 'Tiempo_Fin'
                    FROM bitacora
                    Order by (id) DESC
                ) s
                Order by (Recorrido) ASC;
        ";

        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_ultimos_10;");
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS obtener_ultimos_10;");
    }
}
