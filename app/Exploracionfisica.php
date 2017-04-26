<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exploracionfisica extends Model
{
    protected $table = 'explofisica';
    protected $fillable = ['frenillo','lengua','lingual','encias','paduro','pablando','alveorales','faringe','boca','salival','carrillos','yugal','hallazgos','observaciones','folio_expediente','status'];
    public $timestamps = false;
}
