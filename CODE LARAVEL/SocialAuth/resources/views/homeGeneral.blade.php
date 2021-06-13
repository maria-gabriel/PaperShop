@extends('layouts.app2')
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
            </div>
        </div>
    </div>
</div>
@endsection