<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = ['matricula', 'id_usuario','clinica','status'];
    
    public $timestamps = false;    
}
