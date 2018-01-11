<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Paquete;

class TarjetaController extends Controller
{
    public function enviarTarjeta(Request $request){
        $var = $request->all();

        $tarjeta = array( 
            "tarjetahabiente" => $var['tarjetahabiente'], 
            "cvv" => $var['cvv'], 
            "numeroTarjeta" => $var['numero-tarjeta'], 
            "mesVencimiento" => $var['mes'],
            "añoVencimiento" => $var['año']
        ); 

        $transaccion = DB::table('Transaccion')->where('estatusTransaccion', 'en proceso')
                                ->where('Usuario_id', Auth::user()->id)
                                ->get();

        $datos = array ($tarjeta, $transaccion);
        var_dump($datos);


        //Cuando obtenemos la respuesta actualizamos el estado de la tabla
        //cambiar el estado de ******procesada********
        /*DB::table('Transaccion')->where('estatusTransaccion', 'en proceso')
                                ->where('Usuario_id', Auth::user()->id)
                                ->update(['estatusTransaccion' => "******procesada****"]);*/

    }
}