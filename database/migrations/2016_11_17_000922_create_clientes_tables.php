<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('cli_id');
            $table->unsignedInteger('usu_id');
            $table->string('cli_nombre', 100);
            $table->string('cli_ci', 15)->unique();
            $table->string('cli_email', 100)->unique();
            $table->string('cli_direccionfiscal', 500);
            $table->string('cli_direccionenvio', 500);
            $table->string('cli_banco', 100);
            $table->string('cli_nrocuenta', 50);
            $table->string('cli_tipocuenta', 20);
            $table->timestamp('cli_fechacreacion');
            $table->timestamp('cli_fechaactualizacion');
        });

        Schema::create('clientes_historicos', function (Blueprint $table) {
            $table->increments('clh_id');
            $table->unsignedInteger('cli_id');
            $table->string('clh_columna', 50);
            $table->string('clh_valor', 20);
            $table->unsignedInteger('usu_id');
            $table->string('clh_descripcion', 500)->nullable();
            $table->timestamp('clh_fechacreacion');
            $table->timestamp('clh_fechaactualizacion');
        });

    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes_historicos');
        Schema::drop('clientes');
    }
}
