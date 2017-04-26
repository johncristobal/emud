<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bucalodinicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('bucalodinicio',function(Blueprint $table){
        
            $table->increments('id');
            $table->datetime('fecha');
            $table->string('vestibular11');
            $table->string('vestibular31');
            $table->string('vestibular16');
            $table->string('vestibular26');
            $table->string('lingual36');
            $table->string('lingual46');
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
        Schema::drop('bucalodinicio');
    }
}
