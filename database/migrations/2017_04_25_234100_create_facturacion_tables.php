<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos_facturaciones', function (Blueprint $table) {
            $table->increments('cfa_id');
            $table->string('cfa_estatus', 20);
            $table->string('cfa_nombre', 20);
            $table->timestamps();
        });

        Schema::create('conceptos_facturaciones_historicos', function (Blueprint $table) {
            $table->increments('cfh_id');
            $table->unsignedInteger('cfa_id');
            $table->string('cfh_columna', 50);
            $table->string('cfh_valor', 20);
            $table->unsignedInteger('usu_id');
            $table->string('cfh_descripcion', 500)->nullable();
            $table->timestamp('cfh_fechacreacion');
            $table->timestamp('cfh_fechaactualizacion');
        });

        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('fac_id');
            $table->string('fac_estatus', 20);
            $table->unsignedInteger('cli_id');
            $table->timestamps();
        });

        Schema::create('facturas_historicos', function (Blueprint $table) {
            $table->increments('fah_id');
            $table->unsignedInteger('fac_id');
            $table->string('fah_columna', 50);
            $table->string('fah_valor', 20);
            $table->unsignedInteger('usu_id');
            $table->string('fah_descripcion', 500)->nullable();
            $table->timestamp('fah_fechacreacion');
            $table->timestamp('fah_fechaactualizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturas_historicos');
        Schema::drop('facturas');
        Schema::drop('conceptos_facturaciones_historicos');
        Schema::drop('conceptos_facturaciones');
    }
}
