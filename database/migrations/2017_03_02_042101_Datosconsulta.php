<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Datosconsulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosconsulta',function (Blueprint $table){
           $table->increments('id');
           $table->string('motivo');
           $table->string('nota_ingreso');
           $table->string('alergia');
           $table->string('somatria');
           $table->float('estatura');
           $table->float('peso');
           $table->string('pulso');
           $table->string('frecuencia');
           $table->string('tension');
           $table->string('temperatura');
           $table->string('sanguineo');
            $table->integer('folio_expediente')->unsigned();
            $table->integer('status')->unsigned();

            $table->foreign('folio_expediente')->references('id')->on('expediente');
            $table->foreign('status')->references('id')->on('estatusexpedientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('datosconsulta');
    }
}
