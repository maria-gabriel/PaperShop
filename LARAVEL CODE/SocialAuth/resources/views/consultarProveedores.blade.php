@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')
<div class="row justify-content-center">
<div class="col-lg-8">
@if(session()->has('msj'))
    <div class="alert alert-success" role="alert">
        {{session('msj')}}</div>
@endif
<a class="text-uppercase btn btn-info mx-auto d-block" href="{{ route('agregarProveedor') }}">AGREGAR PROVEEDOR</a>
</div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-8 post-list">
		<br><br><div class="single-post d-flex flex-row" style="box-shadow: 2px 2px 10px #666; align-content: center;">
				<table class="table">
                <thead bgcolor="#4BC4D3" style="border-color: #4BC4D3; color: #FFFFFF;">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Dirección</th>
                      <th scope="col">Teléfono</th>
                      <th></th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach($proveedores as $p)
                    <tr>
                        <th scope="row">{{$p->id}}</th>
                        <td scope="row">{{$p->nombre}}</td>
                        <td scope="row">{{$p->direccion_id2}}, {{$p->direccion_id}} {{$p->direccion_id3}}</td>
                        <td scope="row">{{$p->telefono}}</td>
                        <td scope="row" style="text-align: right;">
                        <ul class="btns" style="margin-left: 250px;">
            						<li><button class="lnr lnr-pencil form-btn" onMouseover="this.style.color='white'" onMouseout="this.style.color='black'"><a href="#"></a></button></li>
            						<li>
                        <form method="POST" action="{{route('eliminarProveedor',$p->id)}}">
                        @csrf
                        <button type="submit" class="lnr lnr-trash form-btn" onMouseover="this.style.color='white'" onMouseout="this.style.color='black'"></button>
                        </form>
          						</li>
          						</ul>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>	
		</div>
	</div>	
</div>
@endsection