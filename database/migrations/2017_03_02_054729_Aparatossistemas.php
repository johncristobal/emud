<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aparatossistemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aparatossistemas',function(Blueprint $table){
           $table->increments('id');
           $table->string('digestivo');
           $table->string('respiratorio');
           $table->string('cardiovascular');
           $table->string('esqueletico');
           $table->string('urinario');
           $table->string('linfo');
           $table->string('endocrino');
           $table->string('nervioso');
           $table->string('tegumentario');
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
        Schema::drop('aparatossistemas');
    }
}
