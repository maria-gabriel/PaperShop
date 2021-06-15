<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Proveedor;
use App\Unidad;
use DB;
use PDF;
use Image;
use App\User;
use App\ImageModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProductoController extends Controller
{
    
    public function insertar(Request $request)
    {
        request()->validate([ 
            'nom'=>'required|alpha',
            'mar'=>'required|',
            'des'=>'required|min:10',
            'pre'=>'required|numeric',
            'can'=>'required|numeric',
            'uni'=>'required|numeric',
            'pro'=>'required|numeric',
            'img'=>'required|image'
        ],[
            'nom.required'=>'Ingrese el nombre del producto',
            'nom.alpha'=>'El nombre debe ser formato texto',
            'mar.required'=>'Ingrese la marca del producto',
            'des.required'=>'Ingrese una descripción',
            'des.min'=>'El campo debe tener mínimo 10 caracteres',
            'pre.required'=>'Ingrese el precio del producto',
            'pre.numeric'=>'El precio debe ser formato numérico',
            'can.numeric'=>'La cantidad debe ser formato numérico',
            'can.required'=>'Ingrese la cantidad',
            'uni.numeric'=>'La unidad debe ser formato identificador',
            'uni.required'=>'Ingrese el ID de la unidad',
            'pro.numeric'=>'El proveedor debe ser formato identificador',
            'pro.required'=>'Ingrese el ID del proveedor',
            'img.required'=>'Seleccione una imagen para el producto',
            'img.image'=>'El archivo debe ser formato jpg,png,jpeg'
        ]);

        $pro=new Producto;
        $pro->nombre=request()->get('nom');
        $pro->marca=request()->get('mar');
        $pro->descripcion=request()->get('des');
        $pro->precio=request()->get('pre');
        $pro->cantidad=request()->get('can');
        $pro->unidad_id=request()->get('uni');
        $pro->proveedor_id=request()->get('pro');
        $originalImage= $request->file('img');
        $thumbnailImage = Image::make($originalImage);
        $originalPath = public_path().'/img/products/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        //$thumbnailImage->save(time().$originalImage->getClientOriginalName()); 
        $pro->imagen=time().$originalImage->getClientOriginalName();
        $pro->save();

       return \Redirect::to('consultarProductos')->with('msj','El producto ha sido añadido');

    }

    public function consultar()
    {
        $productos=DB::table('productos as p')
        ->join('unidades','p.unidad_id','=','unidades.id')
        ->join('proveedores','p.proveedor_id','=','proveedores.id')
        ->select('p.*','unidades.unidad as unidad_id','proveedores.nombre as proveedor_id')->orderBy('p.id', 'desc')
        ->get();
        return view('consultarProductos',compact('productos'));
    }

    public function agregar()
    {
        $prov=Proveedor::all();
        $uni=Unidad::all();
        return view('agregarProducto',compact('prov','uni'));
    }

    public function obtenerDatos()
    {
        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        $productos=DB::table('productos as p')
        ->join('unidades','p.unidad_id','=','unidades.id')
        ->join('proveedores','p.proveedor_id','=','proveedores.id')
        ->select('p.*','unidades.unidad','proveedores.nombre as proveedor')->orderBy('p.id', 'desc')
        ->get();
        
        $pdf=PDF::loadView('reporte_productos',compact('productos','now'));
        return $pdf->stream('reporte_productos.pdf');
    }

    public function eliminar($id)
    {
        /*$pro=Producto::findOrFail($id);
        $pro->delete();
         return \Redirect::to('consultarProductos')->with('msj','El producto ha sido eliminado');*/
        $pro=Producto::findOrFail($id);
        if(\File::exists(public_path('img/products/'.$pro->imagen))){
          \File::delete(public_path('img/products/'.$pro->imagen));
        }
        Producto::borrar($id);
         return \Redirect::to('consultarProductos')->with('msj','El producto ha sido eliminado');
    }

    public function modificar($id)
    {
        $pro=Producto::findOrFail($id);
       return view('modificarProducto',compact('pro'));  
    }

    public function modificando(Request $request,$id)
    {

        request()->validate([ 
            'nom'=>'required|alpha',
            'mar'=>'required|',
            'des'=>'required|min:10',
            'pre'=>'required|numeric',
            'can'=>'required|numeric',
            'uni'=>'required|numeric',
            'pro'=>'required|numeric',
            'img'=>'required|image'
        ],[
            'nom.required'=>'Ingrese el nombre del producto',
            'nom.alpha'=>'El nombre debe ser formato texto',
            'mar.required'=>'Ingrese la marca del producto',
            'des.required'=>'Ingrese una descripción',
            'des.min'=>'El campo debe tener mínimo 10 caracteres',
            'pre.required'=>'Ingrese el precio del producto',
            'pre.numeric'=>'El precio debe ser formato numérico',
            'can.numeric'=>'La cantidad debe ser formato numérico',
            'can.required'=>'Ingrese la cantidad',
            'uni.numeric'=>'La unidad debe ser formato identificador',
            'uni.required'=>'Ingrese el ID de la unidad',
            'pro.numeric'=>'El proveedor debe ser formato identificador',
            'pro.required'=>'Ingrese el ID del proveedor',
            'img.required'=>'Seleccione una imagen para el producto',
            'img.image'=>'El archivo debe ser formato jpg,png,jpeg'
        ]); 

        $pro=Producto::findOrFail($id);
        $pro->nombre=request()->get('nom');
        $pro->marca=request()->get('mar');
        $pro->descripcion=request()->get('des');
        $pro->precio=request()->get('pre');
        $pro->cantidad=request()->get('can');
        $pro->unidad_id=request()->get('uni');
        $pro->proveedor_id=request()->get('pro');

        if(\File::exists(public_path('img/products/'.$pro->imagen))){
          \File::delete(public_path('img/products/'.$pro->imagen));
        }

        $originalImage= $request->file('img');
        $thumbnailImage = Image::make($originalImage);
        $originalPath = public_path().'/img/products/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150); 
        $pro->imagen=time().$originalImage->getClientOriginalName();

        //$pro->save();
        Producto::modificar($id,$pro);
        return \Redirect::to('consultarProductos')->with('msj','El producto ha sido modificado');
    }
    
}
