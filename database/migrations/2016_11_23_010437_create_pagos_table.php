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
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('pag_id');
            $table->unsignedInteger('usu_id');
            $table->string('pag_estatus',20);
            $table->double('pag_monto');
            $table->string('pag_concepto',100);
            $table->string('pag_nombretc',100);
            $table->string('pag_cith',20);
            $table->string('pag_codigoprocesado',100)->nullable();
            $table->timestamp('pag_fechacreacion');
            $table->timestamp('pag_fechaactualizacion');
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
