<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('no'); 
            $table->string('BIMESTRE',80); 
            $table->string('AniO',80); 
            $table->string('FOLIO',80); 
            $table->string('NOMBRE_COMPLETO',80); 
            $table->string('RFC',20); 
            $table->string('CURP',20); 
             $table->string('PUESTO',80); 
            $table->string('ADSCRIPCION',80); 
            $table->string('ESTUDIOS',150); 
            $table->string('CALLE',80); 
            $table->string('NuMERO',80); 
            $table->string('COLONIA',80); 
            $table->string('copigop',10); 
            $table->string('CIUDAD',80); 
            $table->string('ENTFED',80); 
            $table->string('EDOCIVIL',80); 
            $table->enum('SEXOFM', ['MASCULINO','FEMENINO','SIN DATOS'])->default('SIN DATOS');
            $table->string('NOHIJOS',10); 
            $table->string('FACTORRH',80); 
            $table->string('CORREOE',80); 
            $table->string('TELEFONOCONT',80); 
            $table->string('TELEFONOCEL',80); 
            $table->string('TELEFONOMERGENCIA',80); 
            $table->string('nombrepllamar',150); 
            $table->string('PERIODO_CONTRATO',80); 
            $table->string('FECHA_FIRMA',80); 
            $table->string('SUELDO_MENSUAL',150); 
            $table->string('SUELDO_QUINCENAL',150); 
            $table->string('FECHA_PRESENTACION',80); 
            $table->string('NOMBRE_DIR_PRES',80); 
            $table->string('PUESTO_DIR_PRES',80); 
            $table->string('NOOFPRES',80); 
            $table->string('FECHAOFICIO',80); 
            $table->unsignedInteger('funciones'); 
            $table->text('FUNCIONESPUESTO');
            $table->string('TipoContrato',80); 
            $table->string('Estatus',80); 
            $table->string('primeraPatron',80); 
            $table->string('ORDEN',80); 
            $table->string('PUESTODIRECTORGRAL',80); 
            $table->string('NOMBRES',80); 
            $table->string('apaterno',80); 
            $table->string('amaterno',80); 
            $table->enum('DIRECCION', ['DIRECCION DE AFILIACION Y OPERACIÓN','DIRECCION DE GESTION Y SERVICIOS DE SALUD','DIRECCION GENERAL'])->default('DIRECCION GENERAL');
            $table->string('ESCOLARIDAD',80); 
            $table->string('FECHA_INGRESO',80); 
            $table->string('NOMBRENOM',80); 
            $table->string('CLABE',80); 
            $table->string('FECHABAJA',80); 
            $table->text('bitacora');
            $table->timestamps('METADATO'); 
            $table->binary('foto')->nullable();         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
