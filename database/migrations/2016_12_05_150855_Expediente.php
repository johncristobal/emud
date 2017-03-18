<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente', function(Blueprint $table){
            $table->increments('id');
            $table->string('folio_expediente',50);
            $table->string('nombre_paciente');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->integer('edad')->unsigned();
            $table->string('curp');
            $table->string('fotopath');
            $table->string('ocupacion');
            $table->string('estadocivil');
            $table->string('escolaridad');
            $table->string('religion');
            $table->string('lugar_nacimiento');
            $table->datetime('fecha_inicio');
            $table->string('genero',10);
            $table->datetime('fecha_nacimimiento');
            $table->string('recibo_pago');	
            $table->string('recibo_diagnostico');
            $table->integer('id_alumno')->unsigned();
            $table->integer('status')->unsigned();
            $table->integer('clinica')->unsigned();
            $table->foreign('id_alumno')->references('id')->on('alumnos');
            $table->foreign('status')->references('id')->on('estatusexpedientes');
            $table->foreign('clinica')->references('id')->on('clinicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('expediente');
    }
}
