<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('usu_id');
            $table->string('usu_estatus', 20);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->timestamp('usu_fechavencepassword')->nullable();
            $table->rememberToken();
            $table->timestamp('usu_fechacreacion');
            $table->timestamp('usu_fechaactualizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
