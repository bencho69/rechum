<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('puesto',80); 
            $table->longText('funciones');
            $table->double('sueldomensual',8,2);
            $table->double('sueldoquincenal',8,2);
            $table->string('sueldomensualletras',150);
            $table->string('sueldoquincenalletras',150);
            $table->enum('mando',['OPERATIVO','MEDIO','SUPERIOR'])->default('OPERATIVO');
            $table->binary('foto');         
                });                     
            $table->timestamps('METADATO'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('funciones');
    }
}
