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
        $usuario = DB::table('Usuario')->insert([
            'usuario' => $var['usuario'], 
            'clave' => bcrypt($var['contraseña']),
            'pregunta1' => $var['pregunta-1'], 
            'pregunta2' => $var['pregunta-2'],
            'pregunta3' => $var['pregunta-3'],
            'respuesta1' => bcrypt($var['respuesta-1']),
            'respuesta2' => bcrypt($var['respuesta-2']),
            'respuesta3' => bcrypt($var['respuesta-3'])
        ]);

        return view('site.index', array('usuario' => $usuario));
    }

    public function getUser(Request $request){
        $users = DB::table('Usuario')->select('usuario')->get();
        return json_encode($users, true);
    }

    public function login(Request $request)
    {
        $var = $request->all();
        /*$user = DB::table('Usuario')->where('usuario', $var['usuario'])->first();
        
        if (Hash::check($user->clave, bcrypt($var['contraseña']))){
            echo "hola";
        }
        else{
            echo $user->clave;
            echo "\n";
            echo Hash::make("Contrasena1*");
        }*/
        
        /*if (Hash::check($var['contraseña'], bcrypt($var['contraseña']))){
            echo 'true';
        }
        else{
            echo 'false';
        }*/


        /*if (Auth::attempt(['usuario' => $request->usuario, 'clave' => $request->contraseña ])) {
            // Authentication passed...
            //return redirect("productos")->with('status', 'true');
            echo "true";            
        }
        else{
            //return redirect("/")->with('status', 'false');
            echo "false";
        }*/
    }

    public function logout(){   
        Auth::logout();
        session()->flush();
        return redirect("{{url('site.index')}}"); 
    }
}