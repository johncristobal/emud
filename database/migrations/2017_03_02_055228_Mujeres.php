<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mujeres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mujeres',function(Blueprint $table){
        
            $table->increments('id');
            $table->string('sintomas');
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
        Schema::drop('mujeres');
    }
}
