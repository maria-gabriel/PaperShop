<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PapeleriaTrait;

class VentaD extends Model
{
	use PapeleriaTrait;
    
    protected $table="detalle_ventas";
    protected $filltable = ['venta_id','precio_total','producto_id','cantidad'];
    
}
