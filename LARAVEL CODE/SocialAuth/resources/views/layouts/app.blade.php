<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PaperShop</title>

    <link rel="stylesheet" href="{{ url('/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ url('/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('/css/main.css') }}">

</head>
<body>
    <header id="header" id="home">
                <div class="container">
                    <div class="row align-items-center justify-content-between d-flex">
                      <div id="logo">
                        <h3 style="color: #FFFFFF;">PAPER SHÖP</h3>
                      </div>
                      <nav id="nav-menu-container">
                        <ul class="nav-menu">
                          <li class="menu-active"><a href="/">Inicio</a></li>
                          <li class="menu-active"><a></a></li>
                          <li class="menu-active"><a href="/">Contacto</a></li>
                          <li class="menu-active"><a></a></li>
                          <li><a class="ticker-btn3" href="{{ route('login') }}">Login</a></li>
                          <li><a class="ticker-btn3" href="{{ route('register') }}">Registro</a></li>                                                  
                        </ul>
                      </nav><!-- #nav-menu-container -->                    
                    </div>
                </div>
              </header>

              <section class="banner-area relative" id="home" style="height: 150px;">  
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row fullscreen d-flex align-items-center justify-content-center">
                        <div class="banner-content col-lg-12">
                            
                        </div>                                          
                    </div>
                </div>
            </section>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('/js/vendor/jquery-2.2.4.min.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="{{ asset('/js/vendor/bootstrap.min.js') }}"></script>          
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
            <script src="{{ asset('/js/easing.min.js') }}"></script>            
            <script src="{{ asset('/js/hoverIntent.js') }}"></script>
            <script src="{{ asset('/js/superfish.min.js') }}"></script> 
            <script src="{{ asset('/js/jquery.ajaxchimp.min.js') }}"></script>
            <script src="{{ asset('/js/jquery.magnific-popup.min.js') }}"></script> 
            <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>          
            <script src="{{ asset('/js/jquery.sticky.js') }}"></script>
            <script src="{{ asset('/js/jquery.nice-select.min.js') }}"></script>        
            <script src="{{ asset('/js/parallax.min.js') }}"></script>      
            <script src="{{ asset('/js/mail-script.js') }}"></script>   
            <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
