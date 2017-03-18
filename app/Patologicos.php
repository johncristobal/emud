<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patologicos extends Model
{
    protected $table = 'patologicos';
    protected $fillable = ['enfermedad','observaciones','folio_expediente','status'];
    public $timestamps = false;
}
