<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Direccion local del archivo que queremos subir
        $fileLocal = storage_path('app/index.html');
 
        /*Direccion remota donde queremos subir el archivo
        En este caso seria a la raiz del servidor*/
       
        $fileRemote = '/indexftp.html';
 
        $mode = 'FTP_BINARY';
 
        //Hacemos el upload
        \FTP::connection('connectionA')->uploadFile($fileLocal,$fileRemote,$mode);
        //\FTP::connection()->uploadFile($fileLocal,$fileRemote,$mode);

        echo "before";

        $listing = \FTP::connection('connectionA')->getDirListing();
         echo $listing;
 
         echo "after";
         
        //Detenemos la funcion con un mensajes
        return('Operación realizada con éxito'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
