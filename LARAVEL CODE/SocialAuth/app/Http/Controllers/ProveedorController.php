<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use DB;
use App\ImageModel;
use Illuminate\Support\Facades\Input;


class ProveedorController extends Controller
{
    
    public function insertar(Request $request)
    {
        request()->validate([ 
            'nom'=>'required|alpha',
            'dir'=>'required|numeric',
            'tel'=>'required|numeric'
        ],[
            'nom.required'=>'Ingrese el nombre del proveedor',
            'nom.alpha'=>'Eñ nombre debe ser formato texto',
            'dir.required'=>'Ingrese el ID de la dirección',
            'dir.numeric'=>'El ID debe ser formato identificador',
            'tel.required'=>'Ingrese el teléfono del proveedor',
            'tel.numeric'=>'El teléfono debe ser formato numérico'
        ]);

        $pro=new Proveedor;
        $pro->nombre=request()->get('nom');
        $pro->direccion_id=request()->get('dir');
        $pro->telefono=request()->get('tel');
        $pro->save();

       return \Redirect::to('consultarProveedores')->with('msj','El proveedor ha sido añadido');

    }

    public function consultar()
    {
        $proveedores=DB::table('proveedores as p')
        ->join('direcciones','p.direccion_id','=','direcciones.id')
        ->select('p.*','direcciones.estado as direccion_id','direcciones.ciudad as direccion_id2','direcciones.codigo_postal as direccion_id3')
        ->get();
        return view('consultarProveedores',compact('proveedores'));
    }

    public function eliminar($id)
    {
        Proveedor::borrar($id);
         return \Redirect::to('consultarProveedores')->with('msj','El proveedor ha sido eliminado');
    }

}
