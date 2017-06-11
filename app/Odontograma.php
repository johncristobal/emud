<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
	 public $timestamps = false; //Linea que quita las columnas update and create
    protected $table = 'odontogramas'; //Cuando la tabla no se llama como el modelo, aqui se escribe el nombre de la tabla para evitar
    									//problemas de igualdad.
}
