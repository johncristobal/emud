<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bucalodfinal extends Model
{
    protected $table = 'bucalodfinal';
    protected $fillable = ['fecha','vestibular11','vestibular31','vestibular16','vestibular26','lingual36','lingual46','observaciones','folio_expediente','status'];
    public $timestamps = false;
}
