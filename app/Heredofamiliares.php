<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heredofamiliares extends Model
{
    protected $table = 'heredofamiliares';
    protected $fillable = ['tipo','dato','folio_expediente','status'];
    public $timestamps = false;
}
