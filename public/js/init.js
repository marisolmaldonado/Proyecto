let type = "WebGL"
if (!PIXI.utils.isWebGLSupported()) {
    type = "canvas"
}

PIXI.utils.sayHello(type)

//Altura del Juego
var heightWindow = window.innerHeight;
var width = 700;

//Creando Variables para Pixi, Usuario y enemigos
let Application = PIXI.Application,
    loader = PIXI.loader,
    resources = PIXI.loader.resources,
    Text = PIXI.Text,
    TextStyle = PIXI.TextStyle,
    Graphics = PIXI.Graphics,
    renderer = PIXI.autoDetectRenderer(width, heightWindow);

let principal;
let enemigos = [];
//let velocidadGeneraEnemigo = 100;
//let cuentaInfinita = 0;
let velocidadEnemigo = 1;
let velocidadPrincipal =4;
let velocidaEstandarEnemigo = 1;
let Background;
let Asteroids;
let util = new SpriteUtilities(PIXI);
let Fondo;
//Dimensiones frontales - Limites delñ juego
let Laterales = 1;
let PosicionFinalAncho = renderer.width - (Laterales + 40);
let PosicionFinal;
let game;
let consecutivoEnemigos=0;
let activeVelocidad = false;
let totalPasaNaves= 0;
let nivel = 0;
let puntos = 0;
let puntoAdicional = 0;
//Variables sonido de fondo
let SoundFondo;
let SoundExplosion;
let SoundPrincipal;



//Cargar imagenes de el juego y audio dle juego
loader.add('espacio','storage/universo.png')
        .add('asteroides','storage/asteroides.png')
        .add('SoundFondo',"storage/sonidos/audioFondo.mp3")
        .add('SoundNave','storage/sonidos/space_loop.mp3')
        .add('SoundExplosion','storage/sonidos/008846681_prev.mp3')
        ;
loader.load();


//mostrar errores de carga
loader.onError.add((e, d)=>{
    
});

//mostrar carga de cada imagen
loader.onLoad.add((e, p)=>{
   
});

//Enviar los recursos del juego
loader.onComplete.add((loader,resources)=>{
    Background = resources['espacio'].texture;
    Asteroids = resources['asteroides'].texture;
    SoundFondo = resources['SoundFondo'].sound;
    SoundFondo.play();
    SoundFondo.volume = 0.5;
    SoundFondo.loop = 1;
    SoundPrincipal = resources['SoundNave'].sound;
    SoundPrincipal.loop=1;
    SoundPrincipal.speed =0.3;
    SoundExplosion = resources['SoundExplosion'].sound;
});

//Empaquetar todas las funciones del archivo init
function init(){
    
    //Sonido para
    SoundFondo.pause();
    //Variables para resetear el juego - El intentalo de nuevo
    enemigos = [];
    //velocidadGeneraEnemigo = 100;
    //cuentaInfinita = 0;
    velocidadEnemigo = 1;
    velocidadPrincipal =4;
    velocidaEstandarEnemigo = 1;
    consecutivoEnemigos = 0;
    activeVelocidad = false;
    totalPasaNaves = 0;
    puntoAdicional = 0;
    //Varible que da nivel 
    nivel = 0;
    puntos = 0;
    //Dando forma a el juego
    game = new Application({ width:width, height:heightWindow });
    game.renderer.backgroundColor = 0x061639;
    game.renderer.autoRezise = true;

    //Devolviendo a la vista HTML
    document.getElementById("juego").appendChild(game.view);

    setup();
}

//Configuracion Jugador
function setup(delta) {
    //Creando fondo de juego con lafuncion sprite utilities
    Fondo = util.tilingSprite(Background, renderer.width, renderer.height, 0,0);
    //Moviendo fondo
    Fondo.tileY = 0;

    //Cargando fondo
    game.stage.addChild(Fondo);

    //Declarando variables de teclado
    let left = keyboard("ArrowLeft"), 
        right = keyboard("ArrowRight");
        down = keyboard("ArrowDown");
    //Creando y configurando jugador
    principal = jugador();
    game.stage.addChild(principal);
    //Funciones de reconocimiento de Teclado
    left.press = () => { 
        principal.vx = -velocidadPrincipal;
        principal.vy = 0;
        //Limitando hacia la izquierda
        PosicionFinal = Laterales;
    }   
    left.release = () => {
            principal.vx = 0;
            principal.vy = 0;
    }
    right.press = () => { 
        principal.vx = velocidadPrincipal;
        principal.vy = 0;
        //Limitando hacia la derecha
        PosicionFinal = PosicionFinalAncho;
    }   
    right.release = () => {
            principal.vx = 0;
            principal.vy = 0;
    }
    //Para la velocidad de enemigo se utilizara el down
    down.press = () => {
        activeVelocidad = true;
    }   
    down.release = () => {
        activeVelocidad = false;
    }
    //Sonido Principal
    SoundPrincipal.play();
    //
    state = play;
    //
    game.ticker.add(delta => gameLoop(delta));
}

//Creando enemigos aleatorios
function gameLoop(delta) {
    //CreandoEnemigos Aleatorios
    //cuentaInfinita++;
    //if((cuentaInfinita % velocidadGeneraEnemigo)==0){
        game.stage.addChild(boots());
    //}

    for (let index = 1; index < enemigos.length; index++) {
        enemigos[index].vy = enemigos[index].vy + velocidadEnemigo; 
        enemigos[index].y = enemigos[index].vy; 
        //Aumentar niveles naves
        if(enemigos[index].y > heightWindow && !enemigos[index].paso){
            enemigos[index].paso = true;
            totalPasaNaves++;
            puntos += ( 2 + puntoAdicional);
            document.querySelector(".puntos").innerHTML = puntos;
            if(totalPasaNaves==50){
                nivel++;
                document.querySelector(".nivel").innerHTML = nivel;
                velocidaEstandarEnemigo += 0.5;
                totalPasaNaves=0;
            }
        }
    }
    //Moviendo fondo
    Fondo.tileY-=1 * velocidadEnemigo;

    state(delta);
   
}

function play (delta){
    //Limitando los bordes de el personaje - no puede salirse de el espacio asignado
    if(principal.x>=Laterales && principal.x <= PosicionFinalAncho){
        //Reconocimiento de Tecla, perimite conocer el estado al momento de aplastar, va cambiando mediante lo reconoce de izquierda a derecha
        principal.x += principal.vx;
        principal.y += principal.vy;
    }else{
        principal.x=PosicionFinal;
    }
    //Funcion para limitar la velocidad
    if(activeVelocidad){
        puntoAdicional = 5;
        velocidadEnemigo = velocidaEstandarEnemigo + 10;
        //velocidadGeneraEnemigo = 10; 
        //Sonido mas velocidad
        SoundPrincipal.speed = 0.7;
    }else{
        puntoAdicional = 0;
        velocidadEnemigo = velocidaEstandarEnemigo;
        //velocidadGeneraEnemigo = 100;
        SoundPrincipal.speed = 0.3;
    }
    
    //Reconocimiento de choque de enemigo para parar el juego
    for (let index = 1; index < enemigos.length; index++) {
        if (hitTestRectangle(enemigos[index], principal)) {            
            console.log("Enemigo lo golpeo");
            gameOver();    
        }
        else{

        }
    }
}

//Funcion para iniciar el juego con la pantalla deinicio
function iniciaGame(){
    document.querySelector(".puntos").innerHTML = 0;
    document.querySelector(".nivel").innerHTML = 0;
    document.querySelector(".pantalla").classList.add("active");
    init();
}

//Funcion de GameOver
function gameOver(){
    SoundPrincipal.stop();
    SoundExplosion.play();
    game.stop();
    document.querySelector(".pantalla").classList.remove("active");
    //Cambio de nombre pantalla
    document.querySelector(".pantalla h1").innerHTML = "Intentalo de nuevo!";
    //Tiempo que tarda en resetear el canvas
    setTimeout(()=>{
        SoundFondo.play();
        //Variable para resetear el canvas
        document.querySelector("canvas").remove(); 
    }, 1000);

}