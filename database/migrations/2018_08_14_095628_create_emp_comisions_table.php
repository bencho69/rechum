<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpComisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_comision', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empleado_id');
            $table->unsignedInteger('comision_id');
            $table->unsignedInteger('tarifa_id');
            $table->string('vehiculo_noe',12);
            // Datos de su comprobación.
            $table->string('programa',80);
            $table->decimal('viaticos', 5, 2);
            $table->decimal('combustible', 5, 2);
            $table->decimal('pasajes', 5, 2);
            $table->decimal('otro', 5, 2);
            $table->decimal('total', 5, 2);
            $table->foreign('empleado_id')
                  ->references('id')->on('comisiones')
                  ->onDelete('cascade');
            $table->foreign('tarifa_id')
                  ->references('id')->on('tarifas')
                  ->onDelete('cascade');
            //$table->foreign('tarifa_id')
            //      ->references('id')->on('tarifas')
            //      ->onDelete('cascade');   
            //  Ésta tabla estará en otra base de datos, sólo necesitamos el catálogo de vehículos 
            //  para obtener el número económico.
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
        Schema::drop('emp_comision');
    }
}
