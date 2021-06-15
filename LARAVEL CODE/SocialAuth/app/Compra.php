<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PapeleriaTrait;

class Compra extends Model
{
	use PapeleriaTrait;
    
    protected $table="compras";
    protected $filltable = ['id','fecha','total_compra'];
    
}
