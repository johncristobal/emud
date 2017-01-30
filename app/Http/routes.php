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

Route::get("producto/crear","ProductController@crear");
Route::post("producto","ProductController@store");


//Envio de cookies
Route::get('pruebacookie', function(){
	$nueva_cookie = cookie('probando', 'valorprobando', 60);
	$response = response("Voy a enviarte una cookie");
	$response->withCookie($nueva_cookie);
	return $response;
});

//=======================================
//Ejemplo de sistema

Route::get('personalizacion', 'PersonalizacionController@personalizar');
Route::post('personalizacion', 'PersonalizacionController@guardarpersonalizacion');

//=========================================
//Ejemplo BD

Route::get('libros','BookController@index');
Route::get('libros/{id}', 'BookController@show')->where(['id' => '[0-9]+']);
Route::get('libros/crear','BookController@create');
Route::post('libros/crear','BookController@store');

/*
 * Ruta para llamar al index
 */
Route::get('/', function () {
    //Load header.blade.php and send to index and every page from provider        
    //Send it to view
    return view('index');
});

//-----------------Rutas Emud--------------
//Expediente
Route::get('Expediente','ExpedienteController@index');

Route::post('Expediente/Alta', 'ExpedienteController@store');  

//Asignar_Expediente
Route::get('Asignar','ExpedienteController@asignar');

//transferir_expeidnete
Route::get('Transferir','ExpedienteController@transferir');
        
//transferir_expeidnete
Route::get('Buscar','ExpedienteController@buscar');

//Ver usuarios
Route::get('Usuarios','UsuariosController@index');

//Ediyar usuarios
Route::get('Editarusuario','UsuariosController@show');

//eliminar expeidnte
Route::post('Usuario/remove/{id}','UsuariosController@destroy');

//dar de alta usuarui
Route::post('/Usuarios/Alta','UsuariosController@store');

//eliminar expeidnte
Route::post('Expediente/remove/{id}','ExpedienteController@destroy');

//reasignar expediente
Route::post('Expediente/Reasignar','ExpedienteController@reasignar');