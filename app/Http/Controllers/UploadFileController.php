<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Expediente;

class UploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $files = \File::files('uploads');//('/uploads');
        foreach ($files as $filemini)
        {
            echo (string)$filemini, "\n";
        }
        return view('uploadfile');
        */
        
        $file = \File::get('1703004/atlas.png');
        $response = \Response::make($file, 200);
        // using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)
        $response->header('Content-Type', 'application/png');
        //$response->header('Content-Disposition', 'inline; filename="'.$file.'""');

        return $response;
    }

    public function showUploadFile(Request $request){
    /*  $file = $request->file('image');
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();
   */
        $file = $request->file('image');
        //echo $file;
        
        //Validar infor en caso de que haya error...
        if($file == null){
            return redirect('/Expediente/imagenes');
        }
        
        //Move Uploaded File
        $id = $request->session()->get('idexpediente','0');
        $expediente = Expediente::find($id);

        //read folder and get items..        
        $destinationPath = $expediente->folio_expediente;

        //$destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
      
        /*$files = File::allFiles($destinationPath);
        foreach ($files as $filemini)
        {
            echo (string)$filemini, "\n";
        }*/
        
        return redirect('/Expediente/imagenes');
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
