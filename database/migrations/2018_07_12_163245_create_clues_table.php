<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCluesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CLUES',13); 
            $table->string('nombreu',80); 
            $table->string('localidad',80); 
            $table->unsignedInteger('km'); 
            $table->string('municipio',80);
            $table->string('region',80);
            $table->enum('tipou', ['URBANA','RURAL','SIN DATO'])->default('URBANA');
            $table->enum('compfis', ['SI','NO'])->default('NO');
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
        Schema::drop('clues');
    }
}
