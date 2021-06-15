<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PapeleriaTrait;

class Proveedor extends Model
{
	use PapeleriaTrait;
    
    protected $table="proveedores";
    protected $filltable = ['id','nombre','direccion_id','telefono'];
    
}
