<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\CompraD;
use DB;
use PDF;
use App\Producto;
use App\ImageModel;
use Illuminate\Support\Facades\Input;


class CompraController extends Controller
{
    
    public function insertar(Request $request)
    {
        request()->validate([ 
            'fec'=>'required|',
            'tot'=>'required|numeric',
        ],[
            'fec.required'=>'Ingrese la fecha de la compra',
            'tot.required'=>'Ingrese el total de la compra',
            'tot.numeric'=>'El total debe ser formato numérico',
        ]);

        $com=new Compra;
        $com->fecha=request()->get('fec');
        $com->total_compra=request()->get('tot');
        $com->save();

       return \Redirect::to('consultarCompras')->with('msj','La compra ha sido añadida');

    }

    public function insertarDetalles(Request $request)
    {
        request()->validate([ 
            'can'=>'required|numeric',
            'fec'=>'required|numeric',
            'pro'=>'required|numeric'
        ],[
            'can.numeric'=>'La cantidad debe ser formato numérico',
            'can.required'=>'Ingrese la cantidad',
            'fec.required'=>'Seleccione una fecha',
            'pro.required'=>'Seleccione un producto'
        ]);

        $id_pro=request()->get('pro');
        $can=request()->get('can');
        $id_co=request()->get('fec');
        $pro=Producto::findOrFail($id_pro);
        $tot=$pro->precio*$can;
        $pro->cantidad=$pro->cantidad+$can;
        $co=Compra::findOrFail($id_co);
        if($co->id==$id_co){
        $co->total_compra=$co->total_compra+$tot;
        }
        $com=new CompraD;
        $com->compra_id=$id_co;
        $com->precio_total=$tot;
        $com->producto_id=$id_pro;
        $com->cantidad=$can;
        $com->save();
        $pro->save();
        $co->save();

       return \Redirect::to('consultarCompras')->with('msj','Los detalles han sido añadidos');

    }

    public function consultar()
    {
        $compras=DB::table('compras as p')
        ->select('p.*')->get();
        $detalles=DB::table('detalle_compras as d')
        ->join('productos','d.producto_id','=','productos.id')
        ->select('d.*','productos.nombre as producto_id')
        ->get();
        return view('consultarCompras',compact('compras','detalles'));
    }

    public function obtenerDatos(Request $request)
    {
        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        $fe=request()->get('f1');
        $fec=request()->get('f2');
        $id=request()->get('id');
        $ventas=DB::table('detalle_compras as p')
        ->join('compras','p.compra_id','=','compras.id')
        
        ->join('productos','p.producto_id','=','productos.id')
        ->select('p.*','compras.fecha as compra_id','productos.nombre as producto_id','productos.precio')->whereBetween('compras.fecha', [$fe, $fec])
        ->get();
        
        $pdf=PDF::loadView('reporte_compras',compact('ventas','now','fe','fec'));
        return $pdf->stream('reporte_compras.pdf');
    }

    public function obtenerGrafica()
    {
        $month=request()->get('mes');
        $detalles=DB::table('detalle_compras as d')
        ->join('productos','d.producto_id','=','productos.id')
        ->join('compras','d.compra_id','=','compras.id')
        ->select('d.*','productos.nombre')->whereMonth('compras.fecha', '=', $month)
        ->get();
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $mm=$month-1;
        $m=$meses[$mm];
        return view('grafica_compras',compact('detalles', 'm'));
    }


    public function detalles()
    {
        $pro=Producto::all();
        $co=Compra::all();
        return view('agregarDetallesCompra',compact('pro','co'));
    }

    public function modificar($id)
    {
        $pro=Producto::all();
        $co=Compra::all();
        $com=CompraD::findOrFail($id);
       return view('modificarCompra',compact('com','pro','co'));  
    }

    public function modificando(Request $request,$id)
    {
        request()->validate([ 
            'can'=>'required|numeric',
            'fec'=>'required|numeric',
            'pro'=>'required|numeric'
        ],[
            'can.numeric'=>'La cantidad debe ser formato numérico',
            'can.required'=>'Ingrese la cantidad',
            'fec.required'=>'Seleccione una fecha',
            'pro.required'=>'Seleccione un producto'
        ]);

        $id_pro=request()->get('pro');
        $can=request()->get('can');
        $id_co=request()->get('fec');
        $pro=Producto::findOrFail($id_pro);
        $tot=$pro->precio*$can;
        $pro->cantidad=$pro->cantidad+$can;
        $co=Compra::findOrFail($id_co);
        if($co->id==$id_co){
        $co->total_compra=$co->total_compra+$tot;
        }
        $com=CompraD::findOrFail($id);
        $com->compra_id=$id_co;
        $com->precio_total=$tot;
        $com->producto_id=$id_pro;
        $com->cantidad=$can;
        $pro->save();
        $co->save();
        CompraD::modificar($id,$com);

       return \Redirect::to('consultarCompras')->with('msj','Los detalles han sido modificados');

    }

    public function eliminar($id)
    {
        Compra::borrar($id);
         return \Redirect::to('consultarCompras')->with('msj','La compra ha sido eliminada');
    }

    public function eliminarDetalles($id)
    {
        CompraD::borrar($id);
         return \Redirect::to('consultarCompras')->with('msj','Los detalles han sido eliminados');
    }

}
