<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nopatologicos extends Model
{
    protected $table = 'nopatologicos';
    protected $fillable = ['inmunizacion','toxicominas','habitos','vivienda','servicios','observaciones','folio_expediente','status'];
    public $timestamps = false;
}
