@extends(Auth::user()->perfil_id==1 ? 'layouts.app2' : 'layouts.app3')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @if(session()->has('msj'))
        <div class="alert alert-success" role="alert">
            {{session('msj')}}
        </div>
        @endif
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-5 post-list">
        <br>
            <br>
                <div class="single-post d-flex flex-row" style="box-shadow: 2px 2px 10px #666; align-content: center;">
                    <div class="row">
                        <div class="col-lg-5" style="text-align: left; padding-left: 20px;">
                            <div class="titles" style="width: 480px;">
                                <a href="">
                                    <h4 style="font-size: 20px; text-transform: uppercase;">
                                        <span class="lnr lnr-user">
                                        </span>
                                        {{Auth::user()->name}}
                                    </h4>
                                </a>
                                @if(Auth::user()->perfil_id==1)
                                <h6 style="font-size: 17px;">
                                    <b>
                                        Usuario General
                                    </b>
                                </h6>
                                @else
                                <h6 style="font-size: 17px;">
                                    <b>
                                        Usuario Administrador
                                    </b>
                                </h6>
                                @endif
                                <p style="font-size: 17px; color:#46A4B1;">
                                    <span class="lnr lnr-email">
                                    </span>
                                    {{Auth::user()->email}}
                                </p>
                                <br>
                                    <h5 class="address">
                                        <span class="lnr lnr-diamond">
                                        </span>
                                        Identificador: {{Auth::user()->id}}
                                    </h5>
                                    <h5 class="address" type="password">
                                        <span class="lnr lnr-lock">
                                        </span>
                                        Contraseña: ●●●●●●●●
                                    </h5>
                                    <br>
                                        <a class="text-uppercase btn btn-info mx-auto d-block" href="{{ route('editarPerfil') }}">
                                            <span class="lnr lnr-cog">
                                            </span>CONFIGURAR MI CUENTA
                                            
                                        </a>
                                    </br>
                                </br>
                            </div>
                        </div>
                        <div class="col" style="padding-right: 30px; text-align: center;"><br><br>
                            <img alt="" height="120" src="img/avatars/{{Auth::user()->avatar}}" width="120" style="border-radius: 50%">
                            </img>
                        </div>
                    </div>
                </div>
            </br>
        </br>
    </div>
</div>
@endsection
