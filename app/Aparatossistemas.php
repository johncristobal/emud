<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aparatossistemas extends Model
{
    protected $table = 'aparatossistemas';
    protected $fillable = ['digestivo','respiratorio','cardiovascular','esqueletico','urinario','linfo','endocrino','nervioso','tegumentario','observaciones','folio_expediente','status'];
    public $timestamps = false;
}
