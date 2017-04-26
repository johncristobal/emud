<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Responsable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('telefono');
            
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
        Schema::drop('responsable');
    }
}
