@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')

<div class="container" style="background-image: url(img/fondo.jpg); padding: 20px; width: 79%;">
   <div class="row justify-content-center">
        <div class="card" style="box-shadow: 2px 2px 10px #666;">
        @if(session()->has('msj'))
        <div class="alert alert-success" role="alert">
            {{session('msj')}}</div>
        @endif
        <div class="card-header">{{ __('Ingrese los datos que se solicitan para un nuevo producto') }}</div>
            <div style="padding: 20px;">
                <form action="{{ route('agregandoProducto') }}" class="newsletterForm" method="post" enctype="multipart/form-data">
                @csrf
                
                <label>Nombre:</label><br>
                <input class="form-control" type="text" name="nom" id="nom" value="{{old('nom')}}">
                {!!$errors->first('nom','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Marca:</label><br>
                <input class="form-control" type="text" name="mar" id="mar" value="{{old('mar')}}">
                {!!$errors->first('mar','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Descripción:</label><br>
                <textarea class="form-control" type="text" name="des" id="des" value="">{{old('des')}}</textarea>
                {!!$errors->first('des','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Precio:</label><br>
                <input class="form-control" type="text" name="pre" id="pre" value="{{old('pre')}}">
                {!!$errors->first('pre','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Cantidad:</label><br>
                <input class="form-control" type="text" name="can" id="can" value="{{old('can')}}">
                {!!$errors->first('can','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>ID Unidad:</label><br>
                <select name="uni" id="uni" class="form-control">
                <option selected>Seleccione una unidad</option> 
                @foreach($uni as $u)
                <option value="{{$u->id}}">{{$u->unidad}}</option> 
                @endforeach
                </select>
                {!!$errors->first('uni','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>{{ __('Proveedor:') }}</label>
                <select name="pro" id="pro" class="form-control">
                <option selected>Seleccione un proveedor</option> 
                @foreach($prov as $p)
                <option value="{{$p->id}}">{{$p->nombre}}</option> 
                @endforeach
                </select>
                {!!$errors->first('pro','<div class="alert alert-danger form" role="alert">:message</div>')!!}
    
                <br><label>Imágen:</label><br>
                <input class="form-control" type="file" style=" height: 30px; padding: 0px; " name="img" id="img">
                {!!$errors->first('img','<div class="alert alert-danger form" role="alert">:message</div>')!!}
                <br><br>
                <button type="submit" style="width: 100%;" class="btn btn-info">AGREGAR</button>
                </form>
            </div>
        </div>
        </div>
</div>
@endsection
