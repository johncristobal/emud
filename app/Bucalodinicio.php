<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bucalodinicio extends Model
{
    protected $table = 'bucalodinicio';
    protected $fillable = ['fecha','vestibular11','vestibular31','vestibular16','vestibular26','lingual36','lingual46','observaciones','folio_expediente','status'];
    public $timestamps = false;
}
