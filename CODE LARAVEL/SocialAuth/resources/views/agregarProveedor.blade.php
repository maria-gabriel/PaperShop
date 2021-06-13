@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')

<div class="container" style="background-image: url(img/fondo.jpg); padding: 20px; width: 79%;">
   <div class="row justify-content-center">
        <div class="card" style="box-shadow: 2px 2px 10px #666;">
        @if(session()->has('msj'))
        <div class="alert alert-success" role="alert">
            {{session('msj')}}</div>
        @endif
        <div class="card-header">{{ __('Ingrese los datos que se solicitan para un nuevo proveedor') }}</div>
            <div style="padding: 20px;">
                <form action="{{ route('agregandoProveedor') }}" class="newsletterForm" method="post" enctype="multipart/form-data">
                @csrf
                
                <label>Nombre:</label><br>
                <input class="form-control" type="text" name="nom" id="nom" value="{{old('nom')}}">
                {!!$errors->first('nom','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>ID Dirección:</label><br>
                <input class="form-control" type="text" name="dir" id="dir" value="{{old('dir')}}">
                {!!$errors->first('dir','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Teléfono:</label><br>
                <input class="form-control" type="text" name="tel" id="tel" value="{{old('tel')}}">
                {!!$errors->first('tel','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><br>
                <button type="submit" style="width: 100%;" class="btn btn-info">AGREGAR</button>
                </form>
            </div>
        </div>
        </div>
</div>
@endsection
