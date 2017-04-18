<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('pagos_id');
            $table->string('monto');
            $table->string('concepto');
            $table->string('nombretc');
            $table->string('cith');
            $table->string('userid');
            $table->dateTime('fecha');
            $table->integer('estatus');
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
        Schema::drop('pagos');
    }
}
