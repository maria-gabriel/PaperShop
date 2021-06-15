<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\VentaD;
use App\Producto;
use DB;
use PDF;
use App\ImageModel;
use Illuminate\Support\Facades\Input;


class VentaController extends Controller
{
    
    public function insertar(Request $request)
    {
        request()->validate([ 
            'fec'=>'required|',
            'tot'=>'required|numeric',
            'user'=>'required|numeric'
        ],[
            'fec.required'=>'Ingrese la fecha de la venta',
            'tot.required'=>'Ingrese el total de la venta',
            'tot.numeric'=>'El total debe ser formato numérico',
            'user.required'=>'Ingrese su ID de usuario',
            'user.numeric'=>'El ID debe ser formato identificador'
        ]);

        $ven=new Venta;
        $ven->fecha=request()->get('fec');
        $ven->total_venta=request()->get('tot');
        $ven->user_id=request()->get('user');
        $ven->save();

       return \Redirect::to('consultarVentas')->with('msj','La venta ha sido añadida');

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
        $pro->cantidad=$pro->cantidad-$can;
        $co=Venta::findOrFail($id_co);
        if($co->id==$id_co){
        $co->total_venta=$co->total_venta+$tot;
        }
        $com=new VentaD;
        $com->venta_id=$id_co;
        $com->precio_total=$tot;
        $com->producto_id=$id_pro;
        $com->cantidad=$can;
        $com->save();
        $pro->save();
        $co->save();

       return \Redirect::to('consultarVentas')->with('msj','Los detalles han sido añadidos');

    }

    public function consultar()
    {
        $ventas=DB::table('ventas as p')
        ->join('users','p.user_id','=','users.id')
        ->select('p.*','users.name as user_id')
        ->get();
        $detalles=DB::table('detalle_ventas as d')
        ->join('productos','d.producto_id','=','productos.id')
        ->select('d.*','productos.nombre as producto_id')
        ->get();
        return view('consultarVentas',compact('ventas','detalles'));
    }

    public function obtenerDatos(Request $request)
    {
        $now = new \DateTime();
        $now->format('d-m-Y H:i:s');
        $fe=request()->get('f1');
        $fec=request()->get('f2');
        $ventas=DB::table('detalle_ventas as p')
        ->join('ventas','p.venta_id','=','ventas.id')
        ->join('users','ventas.user_id','=','users.id')
        ->join('productos','p.producto_id','=','productos.id')
        ->select('p.*','ventas.fecha as venta_id','productos.nombre as producto_id', 'ventas.total_venta','users.*','productos.precio')->whereBetween('ventas.fecha', [$fe, $fec])
        ->get();
        
        $pdf=PDF::loadView('reporte_ventas',compact('ventas','now','fe','fec'));
        return $pdf->stream('reporte_ventas.pdf');
    }

    public function obtenerGrafica()
    {
        $month=request()->get('mes');
        $detalles=DB::table('detalle_ventas as d')
        ->join('productos','d.producto_id','=','productos.id')
        ->join('ventas','d.venta_id','=','ventas.id')
        ->select('d.*','productos.nombre')->whereMonth('ventas.fecha', '=', $month)
        ->get();
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $mm=$month-1;
        $m=$meses[$mm];
        return view('grafica_ventas',compact('detalles', 'm'));
    }

    public function detalles()
    {
        $pro=Producto::all();
        $co=Venta::all();
        return view('agregarDetallesVenta',compact('pro','co'));
    }

    public function modificar($id)
    {
        $pro=Producto::all();
        $ve=Venta::all();
        $ven=VentaD::findOrFail($id);
       return view('modificarVenta',compact('ven','pro','ve'));  
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
        $pro->cantidad=$pro->cantidad-$can;
        $co=Venta::findOrFail($id_co);
        if($co->id==$id_co){
        $co->total_venta=$co->total_venta+$tot;
        }
        $com=VentaD::findOrFail($id);
        $com->venta_id=$id_co;
        $com->precio_total=$tot;
        $com->producto_id=$id_pro;
        $com->cantidad=$can;
        $pro->save();
        $co->save();
        VentaD::modificar($id,$com);

       return \Redirect::to('consultarVentas')->with('msj','Los detalles han sido modificados');

    }

    public function eliminar($id)
    {
        Venta::borrar($id);
         return \Redirect::to('consultarVentas')->with('msj','La venta ha sido eliminada');
    }

    public function eliminarDetalles($id)
    {
        VentaD::borrar($id);
         return \Redirect::to('consultarVentas')->with('msj','Los detalles han sido eliminados');
    }

}
