<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VentaD;
use PDF;
use DB;

class ControllerPDF extends Controller
{
	public function index(){
	  return view('pdf.listados_informes');
	}

	public function crearPDF($datos, $vista){
          // procesamiento de datos [opcional por si hay que pasarle otra capa de proceso]
	  $ventas = $datos;
		
	  // generación de la vista
	  $pdf = PDF::loadView( $vista, compact('ventas'));

	  // lanzamos la descarga del fichero
	  return $pdf->download('informe.pdf');
	}

	public function crearInforme($ventas){
	  // preparación de los datos que se van a pasar
        /*$f1=request()->get('f1');
        $f2=request()->get('f2');
        $ventas=DB::table('detalle_ventas as p')
        ->join('ventas','p.venta_id','=','ventas.id')
        ->join('productos','p.producto_id','=','productos.id')
        ->select('p.*','ventas.fecha as venta_id','productos.nombre as producto_id', 'ventas.total_venta as total_venta')->whereBetween('ventas.fecha', [$f1, $f2])
        ->get();*/

          // preparación de la ruta a la vista
          $vistaurl = 'consultarVentasImp';

          // llamada a la función que genera el PDF
          return $this->crearPDF($ventas, $vistaurl);
	}
}
