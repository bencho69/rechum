<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('concepto', ['VIATICOS','GCAMINO','TODOS'])->default('VIATICOS');
            $table->string('grupoj',80); 
            $table->double('tarifa',8,2);
            $table->enum('tarifa50', ['SI','NO'])->default('NO');
            $table->enum('moneda', ['PESOS','EURO/DOLAR'])->default('PESOS');
            $table->string('ciudad',300); 
            $table->enum('ciudad', ['ESTATAL','NACIONAL','INTERNACIONAL'])->default('ESTATAL');
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
        Schema::drop('tarifas');
    }
}
