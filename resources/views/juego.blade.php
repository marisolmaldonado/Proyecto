<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FriendShip</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" class="rel">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
   
    <div class="container">
        <div class="pantalla">
            <div class="cont">
                <h1>Bienvenido a <br> Friendship!</h1>
                <button onclick="iniciaGame()"><i class="material-icons"
                        style="font-size:100px;">play_circle_outline</i></button>
            </div>
        </div>
        <div class="puntos">0</div>
        <div class="nivel">0</div>
        <div id="juego"></div>

    </div>
    <div>
    </div> 
<br> 
<button class="btn btn-primary btn-lg" role="link"
onclick="window.location='{{ url('/puntaje') }}'">
Tabla de posiciones
</button> 
    <script src="{{ asset('js/pixi.min.js') }}"></script>
    <script src="{{ asset('js/spriteUtilities.js') }}"></script>
    <script src="{{ asset('js/pixi-sound.js') }}"></script>
    <script src="{{ asset('js/function.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>

</html>

{{-- <a href="{{ url('/puntaje') }}"  class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Tabla de posiciones</a>  --}}
