<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptosFacturacionesHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos_facturaciones_historicos', function (Blueprint $table) {
            $table->increments('pgh_id');
            $table->unsignedInteger('cfa_id');
            $table->string('pgh_columna', 50);
            $table->string('pgh_valor', 20);
            $table->unsignedInteger('usu_id');
            $table->string('pgh_descripcion', 500)->nullable();
            $table->timestamp('pgh_fechacreacion');
            $table->timestamp('pgh_fechaactualizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conceptos_facturaciones_historicos');
    }
}
