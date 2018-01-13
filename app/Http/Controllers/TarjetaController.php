<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Paquete;
use GuzzleHttp\Client;

class TarjetaController extends Controller
{
    public function enviarTarjeta(Request $request){
        $var = $request->all();

        $tarjeta = [ 
            "tarjetahabiente" => $var['tarjetahabiente'], 
            "cvv" => $var['cvv'], 
            "numeroTarjeta" => $var['numero-tarjeta'], 
            "mesVencimiento" => $var['mes'],
            "añoVencimiento" => $var['año']
        ];

        $transaccion = DB::table('Transaccion')->where('estatusTransaccion', 'en proceso')
                                ->where('Usuario_id', Auth::user()->id)
                                ->get();

        var_dump($tarjeta['cvv']);

        //ejemplo visto en la red
        /* 
         $response = $client->post("http://myapp.com/user", [
         // un array con la data de los headers como tipo de peticion, etc.
             'headers' => ['foo' => 'bar'],
             // array de datos del formulario
             'body' => [
                 'CVV' => $tarjeta['cvv']',
                 'emai' => 'foo@bar.com',
                 'pass' => 'secret'
                ]
            ]);
         */

        //Cuando obtenemos la respuesta actualizamos el estado de la tabla
        //cambiar el estado de ******procesada********
        /*DB::table('Transaccion')->where('estatusTransaccion', 'en proceso')
                                ->where('Usuario_id', Auth::user()->id)
                                ->update(['estatusTransaccion' => "******procesada****"]);*/

    }
}