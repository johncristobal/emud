<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsable';
    protected $fillable = ['nombre','materno','paterno','telefono','folio_expediente','status'];
    public $timestamps = false;
}
