<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PapeleriaTrait;

class Producto extends Model
{
	use PapeleriaTrait;
    
    protected $table="productos";
    protected $filltable = ['id','nombre','marca','descripcion','precio','cantidad', 'unidad_id','imagen','proveedor_id'];
    
}
