<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComision extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisiones', function (Blueprint $table) {
            $table->increments('id');
            $table->smallinteger('no');
            $table->date('fechaof');
            $table->date('fechainc');
            $table->date('fechafinc');
            $table->string('origen',80);
            $table->string('destino',80);
            $table->string('periodo',80);
            $table->text('objetivo');
            $table->string('programa',80);
            $table->decimal('viaticos', 5, 2);
            $table->decimal('combustible', 5, 2);
            $table->decimal('pasajes', 5, 2);
            $table->decimal('otro', 5, 2);
            $table->decimal('total', 5, 2);
            $table->text('autorizada');
            $table->text('autorizada');
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
        Schema::drop('comisiones');
    }
}
