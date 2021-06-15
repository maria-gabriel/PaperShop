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
	<div class="col-lg-5 post-list">
		<br><br>
		<div class="single-post d-flex flex-row" style="box-shadow: 2px 2px 10px #666; align-content: center;">
			
			<div class="row">
				<div class="col" style="width: 100%;">
							<form method="POST" action="{{route('editandoPerfil',Auth::user()->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{Auth::user()->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail:') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{Auth::user()->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!---<div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password:') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{Auth::user()->password}}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>--->

                        @if(Auth::user()->perfil_id==1)
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo user:') }}</label>

                            <div class="col-md-8">
                            <select name="type" class="form-control">
                           <option selected value="1">Usuario general</option> 
                           <option value="2">Usuario administrador</option> 
                           </select>
                            </div>
                        </div>
                        @else
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo user:') }}</label>

                            <div class="col-md-8">
                            <select name="type" class="form-control">
                           <option value="1">Usuario general</option> 
                           <option selected value="2">Usuario administrador</option> 
                           </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Avatar:') }}</label>

                            <div class="col-md-8">
                                <input class="form-control" type="file" style=" height: 30px; padding: 0px; " name="img" id="img" src="{{Auth::user()->avatar}}">

                                {!!$errors->first('img','<div class="alert alert-danger form" role="alert">:message</div>')!!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Guardar cambios') }}
                                </button>
                            </div>
                        </div>
                    </form>
					</div>
				</div>
			</div>
			
		</div>
	</div>	
</div>
@endsection