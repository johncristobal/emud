<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Alumno', function(Blueprint $table){
            $table->increments('id');
            $table->string('matricula',50);
            $table->integer('id_usuario')->unsigned();
            $table->integer('clinica')->unsigned();
            $table->integer('status')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade'); 
            $table->foreign('clinica')->references('id')->on('Clinica')->onDelete('cascade'); 
            $table->foreign('status')->references('id')->on('EstatusAlumno')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Alumno');
    }
}
