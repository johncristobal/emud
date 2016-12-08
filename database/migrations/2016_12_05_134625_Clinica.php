<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clinica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::Create('Clinica', function (Blueprint $table){
            $table->increments('id');
            $table->string('nombre_clinica',100);
            $table->string('matricula_clinica',50);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Clinica');
    }
}
