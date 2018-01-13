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
        return redirect('/');
    }

    public function getUser(Request $request){
        $users = DB::table('Usuario')->select('usuario')->get();
        return json_encode($users, true);
    }

    public function getUserData(Request $request){
        $users = DB::table('Usuario')->select('usuario', 'intentos')->get();
        return json_encode($users, true);
    }

    public function postLogin(Request $request)
    {   
        $var = $request->all();
        $user = DB::table('Usuario')->where('usuario', $var['usuario'])->first();
        $intento = $user->intentos;

        $this->validate($request, [
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        if (Hash::check($request->input("contraseña"), $user->clave))
        {
            DB::table('Usuario')->where('id', $user->id)->update(['intentos' => 0]);
            Auth::loginUsingId($user->id);

            $productos = DB::table('Producto')
                            ->select('id', 'nombre', 'precio', 'descripcion', 'imagen')
                            ->get();

            return view("site.productos", ['productos' => $productos]);
        }
        else{
            $intento = $intento + 1;
            DB::table('Usuario')->where('id', $user->id)->update(['intentos' => $intento]);
            if ($intento == 3){
                return redirect("/");
            }
            return redirect("/");
        }
    }

    public function getLogout(){   
        Auth::logout();
        session()->flush();
        return redirect("/")->with('status', 'false');
    }

    public function vistaDesbloquear(Request $request){
        $user = $request->input("user");
        $preguntas = DB::table('Usuario')->where('usuario', $user)->get();

        return view("site.desbloqueo", ['preguntas' => $preguntas]);

        //DB::table('Usuario')->where('id', $id)->update(['intentos' => 0]);
        //return redirect("/")->with('status', 'false');
    }

    public function desbloquearUsuario(Request $request){
        $usuario = $request->all();
        
        $BD = DB::table('Usuario')->select('respuesta1', 'respuesta2', 'respuesta3')
                                  ->where('id', $usuario['id'])->get();

        if (Hash::check($usuario['respuesta1'], $BD[0]->respuesta1) && 
            Hash::check($usuario['respuesta2'], $BD[0]->respuesta2) &&
            Hash::check($usuario['respuesta3'], $BD[0]->respuesta3))
        {
            DB::table('Usuario')->where('id', $usuario['id'])->update(['intentos' => 0]);
            return redirect("/");    
        }
        else{
            echo 'las respuestas no son correctas';
        }
    }
}