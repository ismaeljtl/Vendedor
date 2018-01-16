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
    public function getStatus(Request $request){
        $transaccion = DB::table('Transaccion')->where('estatusTransaccion', 'en proceso')
                                               ->where('Usuario_id', Auth::user()->id)
                                               ->get();

        return json_encode($transaccion, true);
    }

    public function getStatusTable(){
        $datos = DB::table('Transaccion')->where('Usuario_id', Auth::user()->id)
                                         ->get();
        
        return view("site.status" ,['datos' => $datos]);
    }
}