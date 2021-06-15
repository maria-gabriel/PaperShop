@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')

<div class="container" style="background-image: url(img/fondo.jpg); padding: 20px; width: 79%;">
   <div class="row justify-content-center">
        <div class="card" style="box-shadow: 2px 2px 10px #666;">
        @if(session()->has('msj'))
        <div class="alert alert-success" role="alert">
            {{session('msj')}}</div>
        @endif
        <div class="card-header">{{ __('Ingrese los datos que se solicitan para una nueva venta') }}</div>
            <div style="padding: 20px;">
                <form action="{{ route('agregandoVenta') }}" class="newsletterForm" method="post" enctype="multipart/form-data">
                @csrf

                <br><label>Fecha:</label><br>
                <input class="form-control" type="date" name="fec" id="fec" value="{{old('fec')}}">
                {!!$errors->first('fec','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <input class="form-control" type="text" name="tot" id="tot" value="0" style="visibility: hidden;">
                <input class="form-control" type="text" name="user" id="user" value="{{Auth::user()->id}}" style="visibility: hidden;">

                <br><br>
                <button type="submit" style="width: 100%;" class="btn btn-info">AGREGAR</button>
                </form>
            </div>
        </div>
        </div>
</div>
@endsection
