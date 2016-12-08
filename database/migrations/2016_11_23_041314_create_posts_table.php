<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Por ejemplo...crear una nueva tabla...
        //Fachada Schema
        //Metodo post
        //Nombre de la tabla y function
        
        Schema::create('posts', function (Blueprint $table) {
            // código para definir esta tabla
            //Aqio van diferentes tipos de columnas = http://laravel.com/docs/5.1/migrations#creating-columns
            $table->increments('id');       //id incrementable
            $table->string('titulo', 100);  //varchar(100) titulo
            $table->text('cuerpo');         //text cuerpo
            $table->string('email', 200)->unique(); //idices unicos
            $table->integer('visitas');     //integer visitas
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Aqui eliminar la tabla...
        Schema::drop('posts');
    }
}
