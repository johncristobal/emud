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
        Schema::create('Expediente', function(Blueprint $table){
            $table->increments('id');
            $table->string('folio_expediente',50);
            $table->string('nombre_paciente');
            $table->datetime('fecha_inicio');
            $table->string('genero',10);
            $table->datetime('fecha_nacimimiento');
            $table->string('recibo_pago');	
            $table->string('recibo_diagnostico');
            $table->integer('id_alumno')->unsigned();
            $table->integer('status')->unsigned();
            $table->integer('clinica')->unsigned();
            $table->foreign('id_alumno')->references('id')->on('Alumno')->onDelete('cascade');
            $table->foreign('status')->references('id')->on('EstatusExpediente')->onDelete('cascade');
            $table->foreign('clinica')->references('id')->on('Clinica')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Expediente');
    }
}
