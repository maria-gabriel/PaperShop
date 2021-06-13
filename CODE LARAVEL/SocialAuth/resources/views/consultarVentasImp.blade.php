@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')

<div class="row justify-content-center">
<div class="col-lg-10">
@if(session()->has('msj'))
    <div class="alert alert-success" role="alert">
        {{session('msj')}}</div>
@endif

<div class="row justify-content-center">
	<div class="col-lg-10 post-list">
		<br>
				<table class="table">
                <thead bgcolor="#4BC4D3" style="border-color: #4BC4D3; color: #FFFFFF;">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Producto</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Tot. Precio</th>
                      @if(Auth::user()->perfil_id==2)
                      <th width=""></th>
                      @endif
                    </tr>
                  </thead>
                <tbody>
                    @foreach($ventas as $p)
                    <tr>
                        <th scope="row">{{$p->id}}</th>
                        <td scope="row">{{$p->venta_id}}</td>
                        <td scope="row">{{$p->producto_id}}</td>
                        <td scope="row">{{$p->cantidad}}</td>
                        <td scope="row">$ @if($p->precio_total==0) --- @else {{$p->precio_total}} @endif</td>
                        
                        @if(Auth::user()->perfil_id==2)
                        <td scope="row" style="text-align: right;">
             					  
                        </td>
                        @endif
                    </tr>
                    @endforeach

                </tbody>
            </table>	
        <div class="row" style="margin-left: 650px;">TOTAL COMPRA: ${{$p->total_venta}}</div>
        
	</div>	
</div>
@endsection