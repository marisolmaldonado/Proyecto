<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- iconos -->
    <script src="https://kit.fontawesome.com/3e3718e518.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>FriendShip</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
</head>

<body>
    
        <nav class="navbar navbar-expand-lg navbar- ">
            <a class="navbar-brand" href="#">FriendShip</a>
            <ul class="navbar-nav w-100">

                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}"> <i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                @if (Route::has('login'))

                    @auth
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/juego') }}"><i class="fas fa-space-shuttle"></i> Juego <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/puntaje') }}">Puntaje <span
                                    class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li class="nav-item ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Seción</a>
                        </li>
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}"> <i class="fas fa-registered"></i> Registrarse</a>
                            </li>
                            </li>

                        @endif

                        </li>
                    @endauth
                @endif
            </ul>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="storage/welcome.jpeg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="container">
                            <br>
                            <h1>Bienvendio a FriendShip</h1>
                            <p><h3>¿Estas listo para la vidersión? <br>Entonces inicia seción diviertete al máximo</h3></p>
                            <br>
                        </div> 
                        <br>
                        <br>
                        <button class="btn btn-primary btn-lg" role="link"
                            onclick="window.location='{{ route('login') }}'"> <h1><b>Iniciar seción</b></h1></button>
                            
                    </div> 
                    

                </div>

            </div>

        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    
</body>

</html>
