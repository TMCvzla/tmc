<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('clientes_id');
            $table->string('nombre');
            $table->string('ci')->unique();
            $table->string('email')->unique();
            $table->integer('userid');
            $table->string('dirfiscal');
            $table->string('direnvio');
            $table->string('banco');
            $table->string('tipocuenta');
            $table->string('cuenta');
            $table->rememberToken();
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('clientes');
    }
}
