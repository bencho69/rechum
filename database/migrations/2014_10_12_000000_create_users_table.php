<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->enum('tipo', ['ADMIN', 'USR'])->default('USR');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->unsignedInteger('usuario_id')->nullable();
            $table->binary('imagen')->nullable();
            $table->string('RECHUM',1)->default('N');
            $table->string('PASAJES',1)->default('N');
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
        Schema::drop('users');
    }
}
