<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Validator;
use Illuminate\Support\Facades\DB;

class PuntajeController extends Controller
{

    public function puntajeVista()
    {
        $puntaje = \DB::table('users')->select('users.nickName', 'users.puntaje')->orderBy('puntaje','ASC')->get();
        return view('puntaje')->with('puntaje', $puntaje);
    }

}
