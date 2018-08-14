<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('no'); 
            $table->string('clave',20);
            $table->string('nombre',80); 
            $table->enum('tipom', ['MAO','MAOREGIONAL','NAO','OPD'])->default('MAO');
            $table->enum('operando', ['SI','NO'])->default('SI');
            $table->string('areainfluencia',80);
            $table->unsignedInteger('capacidad');  
            $table->enum('turno', ['DIURNO','MATUTINO','VESPERTINO','MIXTO'])->default('DIURNO');
            $table->string('nombre_contrato',80); 
            $table->unsignedInteger('km'); 
            $table->string('region',20); 
            $table->enum('tipou', ['URBANA','RURAL','SIN DATO'])->default('URBANA');
            $table->enum('comprobante', ['SI','NO'])->default('SI');
            $table->string('ciudad',80);
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
        Schema::drop('maos');
    }
}
