@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')

<div class="row justify-content-center">
<div class="col-lg-8">
@if(session()->has('msj'))
    <div class="alert alert-success" role="alert">
        {{session('msj')}}</div>
@endif
</div>
</div>

<div class="row justify-content-center">
<div class="col-lg-7">
<a class="text-uppercase btn btn-info mx-auto d-block" href="{{ route('agregarProducto') }}">AGREGAR PRODUCTO</a>
</div>
<div class="col-lg-1">
<a class="text-uppercase btn btn-info mx-auto d-block" href="{{ route('reporte_de_productos') }}"><span class="lnr lnr-printer"></span></a>
</div>
</div>

@foreach($productos as $p)
<div class="row justify-content-center">
	<div class="col-lg-8 post-list">
		<br><br>
		<div class="single-post d-flex flex-row" style="box-shadow: 2px 2px 10px #666;">
			<div class="thumb" style="padding-right: 30px; text-align: center;">
				<img src="img/products/{{$p->imagen}}" width="220" height="250" alt="">
			</div>
			<div class="row">
				<div class="col-lg-11" >
					<div class="titles" style="width: 480px;">
					<a href=""><h4 style="font-size: 20px; text-transform: uppercase;">{{$p->nombre}}</h4></a>
					<h6 style="font-size: 17px;"><b>Marca: </b> {{$p->marca}}</h6>	
					<p style="font-size: 17px;">
					<b><span class="lnr lnr-book"> </span></i>Descripción: </b>{{$p->descripcion}}</p>
					<h5 class="address"><span class="lnr lnr-layers"></span> Cantidad:  @if($p->cantidad==0) Sin existencias @else $ {{$p->cantidad}} @endif</h5>
					<h5 class="address"><span class="lnr lnr-database"></span> Precio: ${{$p->precio}}</h5>
					<p style="font-size: 15px; text-align: right;">Unidad: {{$p->unidad_id}}<br>
					Proveedor: {{$p->proveedor_id}}</p>				
					</div>
				</div>

				@if(Auth::user()->perfil_id==2)
				<div class="col-lg-1" style="width: 70px;">
					<ul class="btns">
					<li>
						<a href="{{route('modificarProducto',$p->id)}}"><button class="lnr lnr-pencil form-btn" onMouseover="this.style.color='white'" onMouseout="this.style.color='black'"></button></a>
						</li>
					<li>
					<form method="POST" action="{{route('eliminarProducto',$p->id)}}">
                    @csrf
                    <button type="submit" class="lnr lnr-trash form-btn" onMouseover="this.style.color='white'" onMouseout="this.style.color='black'"></button>
                	</form>
					</li>
					</ul>
				</div>
				@endif
			</div>
		</div>
	</div>	
</div>
@endforeach
@endsection