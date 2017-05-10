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
//login
Route::get('/login','UsuariosController@login');

//user loggued
Route::post('/Usuarios/loginuser','UsuariosController@validatelogin');

Route::post('Usuarios/Transferir/Save','UsuariosController@saveTransferir');

//Expediente
Route::get('Expediente','ExpedienteController@index');

Route::post('Expediente/Alta','ExpedienteController@store');  

Route::post('Expediente/readAll','ExpedienteController@getData');  
Route::post('Expediente/saveIdAlumno','ExpedienteController@saveAlumno');  
Route::get('Usuarios/getAlumnos','UsuariosController@getAlumnosData');

Route::get('Expediente/todos','ExpedienteController@verExpedientes');  
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

//rutas-----werever 16 feb 17
/*Route::get('Expediente/FichaExp', function() {
    return view('Alumno.FichaIdentificacion');
});*/
Route::get('Expediente/FichaExp','ExpedienteController@FichaExp');

Route::get('Expediente/FamHeder', 'ExpedienteController@Heredofami');

Route::get('Expediente/AntescPat', 'ExpedienteController@Patologicos');

Route::get('Expediente/AntescNoPat', 'ExpedienteController@Nopatologicos');

Route::get('Expediente/Aparatos', 'ExpedienteController@Aparatos');

Route::get('Expediente/Mujeres', 'ExpedienteController@Mujeres');

Route::get('Expediente/ExplFisica', 'ExpedienteController@Fisica');

Route::get('Expediente/HigOral', 'ExpedienteController@Bucal');

Route::get('Expediente/Receta','PdfController@index');

Route::get('Nota/notas', 'NotaController@Nota');

Route::get('Expediente/Consentimiento', 'ExpedienteController@Consentimiento');

Route::get('Expediente/Diagnostico', 'ExpedienteController@Resumen');

Route::get('/Alumno',function(){
    return redirect('Expediente/principal');
});

//nuEVAS RUTA..............
Route::post('Notas/verimagen','NotaController@loadimagen');

Route::post('Notas/verprincipal/{id}','NotaController@guardarid');
Route::get('Notas/principal','NotaController@vernota');

Route::post('Expediente/verprincipal/{id}','ExpedienteController@guardarid');

Route::get('Expediente/principal','ExpedienteController@verExpediente');

//Rutas para imagnes y notas
Route::get('Expediente/imagenes','ExpedienteController@Imagenes');
Route::get('Expediente/Nota','ExpedienteController@Notas');

//Rutas del formulario
Route::post('Expediente/Alta/Ficha','ExpedienteController@storeFicha');

Route::post('Expediente/Alta/Heredofam','ExpedienteController@storeHeredofam');

Route::post('Expediente/Alta/Patologico','ExpedienteController@storePatologico');

Route::post('Expediente/Alta/Nopatologico','ExpedienteController@storeNopatologico');

Route::post('Expediente/Alta/Aparatos','ExpedienteController@storeAparatos');

Route::post('Expediente/Alta/Bucal','ExpedienteController@storeBucal');

Route::post('Expediente/Alta/Mujeres','ExpedienteController@storeMujeres');

Route::post('Expediente/Alta/Fisica','ExpedienteController@storeFisica');

Route::post('Expediente/Alta/Nota','ExpedienteController@storeNota');

Route::post('Expediente/Alta/Resumen','ExpedienteController@storeResumen');
//ruta para generar el pdf
Route::post('pdf', 'PdfController@invoice');
//Route :: get ('pdf/{id}', 'PdfController@show');

//ftp
Route::get('/ftp', ['as ' => 'ftp', 'uses' => 'FtpController@index']);

//uploadfile
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

//ruta que genera el pdf del consentimiento informado
Route::post('pdfConsent', 'ConsController@invoice');

//Route to close session
Route::get('Usuarios/cerrarsesion','UsuariosController@cerrar');