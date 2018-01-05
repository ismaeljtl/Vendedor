<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Paquete;

class UsuarioController extends Controller
{
    public function registrar(Request $request){
        $var = $request->all();
        $usuario = DB::table('Usuario')->insertGetId([
            'usuario' => $var['usuario'], 
            'clave' => Hash::make($var['contraseña']),
            'pregunta1' => $var['pregunta-1'], 
            'pregunta2' => $var['pregunta-2'],
            'pregunta3' => $var['pregunta-3'],
            'respuesta1' => Hash::make($var['respuesta-1']),
            'respuesta2' => Hash::make($var['respuesta-2']),
            'respuesta3' => Hash::make($var['respuesta-3'])
        ]);

        return view('site.index', array('usuario' => $usuario));
    }

    public function getUser(Request $request){
        $users = DB::table('Usuario')->select('usuario')->get();
        return json_encode($users, true);
    }
}