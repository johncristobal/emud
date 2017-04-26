<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Direccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion',function(Blueprint $table){
        
            $table->increments('id');
            $table->string('calle');
            $table->string('numero');
            $table->string('codigopostal');
            $table->string('colonia');
            $table->string('delegacion');
            $table->string('entidad');
            $table->string('telefono');
            $table->string('idh');
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
        Schema::drop('direccion');
    }
}
