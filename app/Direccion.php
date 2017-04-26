<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direccion';
    protected $fillable = ['calle','numero','codigopostal','colonia','delegacion','entidad','telefono','idh','folio_expediente','status'];
    public $timestamps = false;
}
