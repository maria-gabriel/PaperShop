@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('msj'))
        <div class="alert alert-success" role="alert">
            {{session('msj')}}</div>
            @endif
            <div class="card">
                <a href="{{ route('agregarProducto') }}">
                <div class="single-fcat">
                        <img src="img/a3.png" height="80" width="80" alt="">
                    <p>Agregar productos</p>
                </div>
                </a>
                <a href="{{ route('consultarProductos') }}">
                <div class="single-fcat">
                        <img src="img/a1.png" height="80" width="80" alt="">
                    <p>Consultar productos</p>
                </div>
                </a>
                <a href="{{ route('agregarVenta') }}">
                <div class="single-fcat">
                            <img src="img/a2.png" height="80" width="80" alt="">
                        <p>Agregar venta</p>
                    </div>
                    </a>
                <a href="{{ route('consultarVentas') }}">
                <div class="single-fcat">
                        <img src="img/a4.png" height="80" width="80" alt="">
                    <p>Consultar ventas</p>
                </div>
                </a>
                <a href="{{ route('agregarCompra') }}">
                <div class="single-fcat">
                            <img src="img/a5.jpg" height="70" width="70" alt="">
                        <p>Agregar compra</p>
                    </div>
                    </a>
                <a href="{{ route('consultarCompras') }}">
                <div class="single-fcat">
                        <img src="img/a6.jpg" height="90" width="90" alt="">
                    <p>Consultar compras</p>
                </div>
                </a>
                <a href="{{ route('agregarProveedor') }}">
                <div class="single-fcat">
                            <img src="img/a7.png" height="80" width="80" alt="">
                        <p>Agregar proveedor</p>
                    </div>
                    </a>
                <a href="{{ route('consultarProveedores') }}">
                <div class="single-fcat">
                        <img src="img/a8.png" height="80" width="80" alt="">
                    <p>Consultar proveedores</p>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
