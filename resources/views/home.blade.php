<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- iconos -->
    <script src="https://kit.fontawesome.com/3e3718e518.js" crossorigin="anonymous"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inicio') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div id="app">

        <nav class=" navbar navbar-expand-lg navbar-">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <a class="nav-link" href="{{ route('juego') }}"> <i class="fas fa-gamepad"></i> Juego <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="{{ route('puntaje') }}"><i class="fas fa-list-alt"></i> Puntaje<span
                            class="sr-only">(current)</span></a>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> <i class="far fa-smile"></i>
                                {{ Auth::user()->nickName }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-item active">
                <img class="d-block w-100" src="storage/bozz.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="container">
                        <br>
                        <p><h3>Ayuda a Buzz el astronauta a superar los obstaculos y llegar a la meta<br></h3></p>
                        <br>    
                    </div> 
                    <br>
                    <button class="btn btn-primary btn-lg" role="link"
                            onclick="window.location='{{ route('juego') }}'"> <h3><b>Juega y divierte</b></h3></button>
                </div>
            </div>
        </div>
    </div>
</body>
