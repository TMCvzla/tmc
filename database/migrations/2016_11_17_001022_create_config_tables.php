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
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('con_id');
            $table->string('con_name',100);
            $table->string('con_code',20)->unique();
            $table->string('con_value',100);
            $table->string('con_description', 500)->nullable();
            $table->timestamp('con_createdat');
            $table->timestamp('con_updatedat');
        });


    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configurations');
    }
}
