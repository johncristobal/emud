<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datosconsulta extends Model
{
    protected $table = 'datosconsulta';
    protected $fillable = ['motivo','nota_ingreso','alergia','somatria','estatura','peso','pulso','frecuencia','tension','temperatura','sanguineo','folio_expediente','status'];
    public $timestamps = false;
    
}
