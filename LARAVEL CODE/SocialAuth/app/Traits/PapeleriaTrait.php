<?php


namespace App\Traits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Producto;

trait PapeleriaTrait {

	public static function modificar($id, Model $model){

		return self::where('id',$id)
		->update($model->attributes);

	}

	/*public static function listar($vista){
		
		$productos= self::all();

		return view($vista,compact('productos'));
	}*/

	public static function borrar($id){
		return self::where('id',$id)->delete();
	}
}