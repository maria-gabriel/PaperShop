@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')

<div id="openModal" class="modalDialog">
  <div>
    <a href="#close" title="Close" class="close">X</a>
    <h5>Ingrese el rango de fecha:</h5><br>
      <form action="{{route('reporte_de_ventas')}}" class="newsletterForm" method="post">
          @csrf
          <label>Fecha inicial:</label>
          <input class="form-control" type="date" name="f1" id="f1" placeholder="Nombre" required><br>
          <label>Fecha final:</label>
          <input class="form-control" type="date" name="f2" id="f2" placeholder="Clave" required><br>
          <button type="submit" class="btn btn-info" style="width: 350px;"><span class="lnr lnr-file-empty"></span> GENERAR PDF</button>
      </form>
  </div>
</div>

<div id="openModal2" class="modalDialog">
  <div>
    <a href="#close" title="Close" class="close">X</a>
      <form action="{{route('grafica_ventas')}}" class="newsletterForm" method="post">
          @csrf
          <label>Seleccione un mes:</label><br><br>
          <select name="mes" id="mes" class="form-control">
          <option selected value="01">Enero</option>
          <option value="02">Febrero</option> 
          <option value="03">Marzo</option>
          <option value="04">Abril</option> 
          <option value="05">Mayo</option>
          <option value="06">Junio</option> 
          <option value="07">Julio</option>
          <option value="08">Agosto</option> 
          <option value="09">Septiembre</option>
          <option value="10">Octubre</option> 
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option> 
          </select><br><br>
          <button type="submit" class="btn btn-info" style="width: 350px;"><span class="lnr lnr-chart-bars"></span> GENERAR GRÁFICA</button>
      </form>
  </div>
</div>

<div class="row justify-content-center">
<div class="col-lg-10">
@if(session()->has('msj'))
    <div class="alert alert-success" role="alert">
        {{session('msj')}}</div>
@endif

</div>
</div>
<div class="row justify-content-center">
<div class="col-lg-5">
<a class="text-uppercase btn btn-info mx-auto d-block" href="{{ route('agregarVenta') }}">AGREGAR VENTA</a>
</div>
<div class="col-lg-5">
<a class="text-uppercase btn btn-info mx-auto d-block" href="{{ route('agregarDetallesVenta') }}">AGREGAR DETALLES</a>
</div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-5 post-list">
		<br><br><div class="single-post d-flex flex-row" style="box-shadow: 2px 2px 10px #666; align-content: center;">
				<table class="table">
                <thead bgcolor="#4BC4D3" style="border-color: #4BC4D3; color: #FFFFFF;">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Total de venta</th>
                      <th scope="col">Usuario</th>
                      @if(Auth::user()->perfil_id==2)
                      <th width=""></th>
                      @endif
                    </tr>
                  </thead>
                <tbody>
                    @foreach($ventas as $p)
                    <tr>
                        <th scope="row">{{$p->id}}</th>
                        <td scope="row">{{$p->fecha}}</td>
                        <td scope="row">$ @if($p->total_venta==0) --- @else {{$p->total_venta}} @endif</td>
                        <td scope="row">{{$p->user_id}}</td>
                        @if(Auth::user()->perfil_id==2)
                        <td scope="row" style="text-align: right;">
             						<form method="POST" action="{{route('eliminarVenta',$p->id)}}">
                        @csrf
                        <button type="submit" class="lnr lnr-trash form-btn" onMouseout="this.style.color='black'"></button>
                        </form>
                        <br><a href="#openModal"><button class="lnr lnr-printer form-btn" onMouseout="this.style.color='black'" data-toggle="modal" data-target="#subsModal"></button></a>
                        <br><a href="#openModal2"><button class="lnr lnr-pie-chart form-btn" onMouseout="this.style.color='black'" data-toggle="modal" data-target="#subsModal"></button></a><br>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>	
		</div>
	</div>	
  <div class="col-lg-5 post-list">
    <br><br><div class="single-post d-flex flex-row" style="box-shadow: 2px 2px 10px #666; align-content: center;">
        <table class="table">
                <thead bgcolor="#4BC4D3" style="border-color: #4BC4D3; color: #FFFFFF;">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ID venta</th>
                      <th scope="col">Precio total</th>
                      <th scope="col">Producto</th>
                      <th scope="col">Cantidad</th>
                      @if(Auth::user()->perfil_id==2)
                      <th width=""></th>
                      @endif
                    </tr>
                  </thead>
                <tbody>
                    @foreach($detalles as $d)
                    <tr>
                        <th scope="row">{{$d->id}}</th>
                        <td scope="row">{{$d->venta_id}}</td>
                        <td scope="row">$ {{$d->precio_total}}</td>
                        <td scope="row">{{$d->producto_id}}</td>
                        <td scope="row">{{$d->cantidad}}</td>
                        @if(Auth::user()->perfil_id==2)
                        <td scope="row" style="text-align: right;">
                        <a href="{{route('modificarVenta',$d->id)}}"><button class="lnr lnr-pencil form-btn" onMouseout="this.style.color='black'"></button></a><br>
                        <form method="POST" action="{{route('eliminarDetallesVenta',$d->id)}}">
                        @csrf
                        <button type="submit" class="lnr lnr-trash form-btn" onMouseout="this.style.color='black'"></button>
                        </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>  
    </div>
  </div>
</div>
@endsection