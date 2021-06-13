@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')
@if(isset($pro))
<div class="container" style="background-image: url(img/fondo.jpg); padding: 20px; width: 79%;">
   <div class="row justify-content-center">
        <div class="card" style="box-shadow: 2px 2px 10px #666;">
        @if(session()->has('msj'))
        <div class="alert alert-success" role="alert">
            {{session('msj')}}</div>
        @endif
        <div class="card-header">{{ __('Ingrese los datos que se solicitan para modificar un producto') }}</div>
            <div style="padding: 20px;">
                <form action="{{route('modificandoProducto',$pro->id)}}" class="newsletterForm" method="post" enctype="multipart/form-data">
                @csrf
                
                <label>Nombre:</label><br>
                <input class="form-control" type="text" name="nom" id="nom" value="{{$pro->nombre}}">
                {!!$errors->first('nom','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Marca:</label><br>
                <input class="form-control" type="text" name="mar" id="mar" value="{{$pro->marca}}">
                {!!$errors->first('mar','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Descripción:</label><br>
                <textarea class="form-control" type="text" name="des" id="des" value="">{{$pro->descripcion}}</textarea>
                {!!$errors->first('des','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Precio:</label><br>
                <input class="form-control" type="text" name="pre" id="pre" value="{{$pro->precio}}">
                {!!$errors->first('pre','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Cantidad:</label><br>
                <input class="form-control" type="text" name="can" id="can" value="{{$pro->cantidad}}">
                {!!$errors->first('can','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>ID Unidad:</label><br>
                <input class="form-control" type="text" name="uni" id="uni" value="{{$pro->unidad_id}}">
                {!!$errors->first('uni','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>ID Proveedor:</label><br>
                <input class="form-control" type="text" name="pro" id="pro" value="{{$pro->proveedor_id}}">
                {!!$errors->first('pro','<div class="alert alert-danger form" role="alert">:message</div>')!!}

                <br><label>Imágen:</label><br>
                <input class="form-control" type="file" style=" height: 30px; padding: 0px; " name="img" id="img" value="{{$pro->imagen}}">
                {!!$errors->first('img','<div class="alert alert-danger form" role="alert">:message</div>')!!}
                <br><br>
                <button type="submit" style="width: 100%;" class="btn btn-info">MODIFICAR</button>
                </form>
            </div>
        </div>
        </div>
</div>
@endif
@endsection
