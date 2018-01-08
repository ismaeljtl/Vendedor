<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Paquete;

class ProductoController extends Controller
{

    public function getCompra(Request $request){
        $var = $request->all();
        $monto = 0;
        $fecha = date("Y-m-d h:i:sa");

        $cantCamisa = $request->input("cantidad-camisa");
        $cantPantalon = $request->input("cantidad-pantalon");

        if (array_key_exists('camisa', $var)){
            $camisa = DB::table('Producto')->where('nombre', 'camisa')->get();
            $monto += $camisa[0]->precio * $cantCamisa; 
        }
        if (array_key_exists('pantalon', $var)){
            $pantalon = DB::table('Producto')->where('nombre', 'pantalon')->get();
            $monto += $pantalon[0]->precio * $cantPantalon; 
        }
        
    }

}