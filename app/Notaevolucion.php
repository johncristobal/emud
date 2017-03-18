<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notaevolucion extends Model
{
    protected $table = 'notaevol';
    protected $fillable = ['fecha','referencia','contraref','nota','folio_expediente','status'];
    public $timestamps = false;
}
