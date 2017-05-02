<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->increments('con_id');
            $table->string('con_nombre',100);
            $table->string('con_codigo',20)->unique();
            $table->string('con_valor',100);
            $table->string('con_descripcion', 500)->nullable();
            $table->timestamp('con_fechacreacion');
            $table->timestamp('con_fechaactualizacion');
        });


    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configuraciones');
    }
}
