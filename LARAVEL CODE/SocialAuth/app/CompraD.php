<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PapeleriaTrait;

class CompraD extends Model
{
	use PapeleriaTrait;
    
    protected $table="detalle_compras";
    protected $filltable = ['compra_id','precio_total','producto_id','cantidad'];
    
}
