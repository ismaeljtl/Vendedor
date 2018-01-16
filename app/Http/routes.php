<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('site/index');
});

Route::get('/registro', function () {
    return view('site/registro');
});

Route::post('registrar', [
    'uses' => 'UsuarioController@registrar',
    'as'   => 'registrar',     
]);

Route::get('getUserData', [
    'uses' => 'UsuarioController@getUserData',
    'as'   => 'getUserData',     
]);

Route::get('getUser', [
    'uses' => 'UsuarioController@getUser',
    'as'   => 'getUser',     
]);

//Route::post('Login', 'Auth\AuthController@postLogin');
//Route::get('Logout', 'Auth\AuthController@getLogout');

Route::post('Login', [
    'uses' => 'UsuarioController@postLogin',
    'as'   => 'Login',     
]);

Route::get('Logout', [
    'uses' => 'UsuarioController@getLogout',
    'as'   => 'Logout',     
]);

Route::get('vistaDesbloquear', [
    'uses' => 'UsuarioController@vistaDesbloquear',
    'as'   => 'vistaDesbloquear',     
]);

Route::post('desbloquearUsuario', [
    'uses' => 'UsuarioController@desbloquearUsuario',
    'as'   => 'desbloquearUsuario',     
]);

Route::get('/productos', function () {
    return view('site/productos');
});

Route::get('getCompra', [
    'uses' => 'ProductoController@getCompra',
    'as'   => 'getCompra',  
]);

Route::get('/volverProd', [
    'uses' => 'ProductoController@volverProd',
    'as'   => 'volverProd',  
]);

Route::post('/getStatus', [
    'uses' => 'TarjetaController@getStatus',
    'as'   => 'getStatus',  
]);

Route::get('/getStatusTable', [
    'uses' => 'TarjetaController@getStatusTable',
    'as'   => 'getStatusTable',  
]);