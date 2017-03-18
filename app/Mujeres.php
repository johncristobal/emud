<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mujeres extends Model
{
    protected $table = 'mujeres';
    protected $fillable = ['sintomas','observaciones','folio_expediente','status'];
    public $timestamps = false;
}
