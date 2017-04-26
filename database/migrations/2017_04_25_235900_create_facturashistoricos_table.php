<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_historicos', function (Blueprint $table) {
            $this->createHistoric($table, 'fac', 'fah');
        });
    }

    public function createHistoric(Blueprint $table, $tablePrefix, $tableHistoricPrefix)
    {
        $table->increments($tableHistoricPrefix . '_id');
        $table->unsignedInteger($tablePrefix . '_id');
        $table->string($tableHistoricPrefix . '_columna', 50);
        $table->string($tableHistoricPrefix . '_valor', 20);
        $table->unsignedInteger('usu_id');
        $table->string($tableHistoricPrefix . '_descripcion', 500)->nullable();
        $table->timestamp($tableHistoricPrefix . '_fechacreacion');
        $table->timestamp($tableHistoricPrefix . '_fechaactualizacion');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturas_historicos');
    }
}
