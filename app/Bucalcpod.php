<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bucalcpod extends Model
{
    protected $table = 'bucalcpod';
    protected $fillable = ['cariados','perdidos','obturados','total','observaciones','folio_expediente','status'];
    public $timestamps = false;

    
}
