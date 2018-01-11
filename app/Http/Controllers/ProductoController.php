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

        $cantCamisa = (int)$request->input("cantidad-camisa");
        $cantPantalon = (int)$request->input("cantidad-pantalon");

        if (array_key_exists('camisa', $var)){
            $camisa = DB::table('Producto')->where('nombre', 'camisa')->get();
            $monto += ((int)$camisa[0]->precio) * $cantCamisa; 
        }
        if (array_key_exists('pantalon', $var)){
            $pantalon = DB::table('Producto')->where('nombre', 'pantalon')->get();
            $monto += ((int)$pantalon[0]->precio) * $cantPantalon; 
        }

        $transaccion = DB::table('Transaccion')->insert([
            'monto' => $monto, 
            'fecha' => $fecha,
            'cantCamisa' => $cantCamisa, 
            'cantPantalon' => $cantPantalon,
            'estatusTransaccion' => "en proceso",
            'Usuario_id' => Auth::user()->id
        ]);
        
        return view('site.tarjeta');
    }

    public function volverProd(){
        $productos = DB::table('Producto')
                        ->select('id', 'nombre', 'precio', 'descripcion', 'imagen')
                        ->get();

        return view("site.productos", ['productos' => $productos]);
    }

}