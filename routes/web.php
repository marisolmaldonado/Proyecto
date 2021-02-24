<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'WelcomeController@welcomeVista')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/juego', 'JuegoController@index')->name('juego')->middleware('auth');

Route::get('/puntaje', 'PuntajeController@puntajeVista')->name('puntaje')->middleware('auth');

