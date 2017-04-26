<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resumen extends Model
{
    protected $table = 'resumen';
    protected $fillable = ['diagnostico','fecha','folio_expediente','status'];
    public $timestamps = false;
    
}
