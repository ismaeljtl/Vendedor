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

Route::get('getUser', [
    'uses' => 'UsuarioController@getUser',
    'as'   => 'getUser',     
]);

Route::get('/productos', function () {
    return view('site/productos');
});

/*
//Registro de personas
Route::get('formPersona', [
            'uses' => 'PersonaController@index',
            'as' => 'formPersona',     
]);
Route::post('createPersona', [
            'uses' => 'PersonaController@create',
            'as' => 'createPersona',     
]);
*/