<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $fillable = ['folio_expediente', 'nombre_paciente','fecha_inicio','genero','fecha_nacimiento','recibo_pago','recibo_diagnostico','id_alumno','status','clinica'];
}
