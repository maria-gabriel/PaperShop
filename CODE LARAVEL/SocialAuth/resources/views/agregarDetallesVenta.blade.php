@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')

<div class="container" style="background-image: url(img/fondo.jpg); padding: 20px; width: 79%;">
   <div class="row justify-content-center">
        <div class="card" style="box-shadow: 2px 2px 10px #666;">
        @if(session()->has('msj'))
        <div class="alert alert-success" role="alert">
            {{session('msj')}}</div>
        @endif
        <div class="card-header">{{ __('Ingrese los datos que se solicitan para los detalles de la venta') }}</div>
            <div style="padding: 20px;">
                <form action="{{ route('agregandoDetallesVenta') }}" class="newsletterForm" method="post" enctype="multipart/form-data">
                @csrf

                <br><label>{{ __('Producto:') }}</label>
                <select name="pro" id="pro" class="form-control">
                <option selected>Seleccione un producto</option> 
                @foreach($pro as $p)
                <option value="{{$p->id}}">{{$p->nombre}}</option> 
                @endforeach
                </select>
                {!!$errors->first('pro','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Cantidad:</label><br>
                <input class="form-control" type="text" name="can" id="can" value="{{old('can')}}">
                {!!$errors->first('can','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>{{ __('Venta:') }}</label>
                <select name="fec" id="fec" class="form-control">
                <option selected>Seleccione la fecha</option> 
                @foreach($co as $c)
                <option value="{{$c->id}}">{{$c->fecha}}</option> 
                @endforeach
                </select>
                {!!$errors->first('com','<div class="alert alert-danger form" role="alert">:message</div>')!!}
                <br><br>
                <button type="submit" style="width: 100%;" class="btn btn-info">AGREGAR</button>
                </form>
            </div>
        </div>
        </div>
</div>
@endsection
