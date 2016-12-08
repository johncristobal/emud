<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $fillable = ['nombre_clinica', 'matricula_clinica','created_at','updated_at'];
    
}
