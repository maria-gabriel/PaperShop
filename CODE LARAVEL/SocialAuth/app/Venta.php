<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PapeleriaTrait;

class Venta extends Model
{
	use PapeleriaTrait;
    
    protected $table="ventas";
    protected $filltable = ['id','fecha','total_venta','user_id'];
    
}
