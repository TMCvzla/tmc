<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTables extends Migration
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
            $table->double('pag_montocomision')->nullable();
            $table->double('pag_montoimpuesto')->nullable();
            $table->double('pag_montocomisiontmc')->nullable();
            $table->double('pag_montocomisionpasarela')->nullable();
            $table->double('pag_montototalcliente')->nullable();
            $table->string('pag_concepto',100);
            $table->string('pag_nombretc',100);
            $table->string('pag_cith',20);
            $table->string('pag_codigoprocesado',100)->nullable();
            $table->timestamp('pag_fechacreacion');
            $table->timestamp('pag_fechaactualizacion');
        });

        Schema::create('pagos_historicos', function (Blueprint $table) {
            $table->increments('pgh_id');
            $table->unsignedInteger('pag_id');
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
        Schema::drop('pagos_historicos');
        Schema::drop('pagos');
    }
}
