<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoresVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valores_variables', function (Blueprint $table) {
            $table->increments('vva_id');
            $table->string('vva_codigo',20);
            $table->string('vva_valor',20);
            $table->string('vva_nombre',100);
            $table->integer('vva_orden');
            $table->string('vva_descripcion',250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('valores_variables');
    }
}
