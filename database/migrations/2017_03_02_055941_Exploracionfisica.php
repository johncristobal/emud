<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Exploracionfisica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explofisica',function(Blueprint $table){
        
            $table->increments('id');
            $table->string('frenillo');
            $table->string('lengua');
            $table->string('lingual');
            $table->string('encias');
            $table->string('paduro');
            $table->string('pablando');
            $table->string('alveorales');
            $table->string('faringe');
            $table->string('boca');
            $table->string('salival');
            $table->string('carrillos');
            $table->string('yugal');
            $table->string('hallazgos');
            $table->string('observaciones');
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
        Schema::drop('explofisica');
    }
}
