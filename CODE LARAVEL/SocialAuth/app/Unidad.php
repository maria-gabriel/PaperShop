<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PapeleriaTrait;

class Unidad extends Model
{
	use PapeleriaTrait;
    
    protected $table="unidades";
    protected $filltable = ['id','unidad'];
    
}
