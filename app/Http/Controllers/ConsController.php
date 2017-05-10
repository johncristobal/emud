<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Expediente;

class ConsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    //Metodo que se encarga de generar el consentimiento en formato pdf
    public function invoice(Request $request)
    {
           
               
        //Validamos los campos del formulario
         $this->validate($request,[
            'paciente' => 'required',
            'doctor' => 'required',
            'testigo1'=> 'required',
            'testigo2' =>'required',      
            ]);

        
       //Fecha que se genera el pdf
        $date = date('d-m-Y');

       //Obteniendo los datos del formulario
        $paciente=$request->input('paciente');
        $doctor=$request->input('doctor');
        $testigo1=$request->input('testigo1');
        $testigo2=$request->input('testigo2');
       
        
        //Manda a llamar el html que generara el pdf, se envian las variables a usar en el pdf
        $view = \View::make('Alumno.Consentimiento', compact('paciente', 'doctor', 
                                                                'testigo1', 'testigo2','date'))-> render();

        //Construye el pdf
        $pdf = \App::make('dompdf.wrapper');
        //Se usa para cargar el pdf en el navegador
        $pdf -> loadHTML($view);  

        //save pdf into folder fo epediente
        $id = $request->session()->get('idexpediente','0');
        $expediente = Expediente::find($id);
        //read folder and get items..        
        $destinationPath = $expediente->folio_expediente;

        //$destinationPath = 'uploads';
        //$file->move($destinationPath,$file->getClientOriginalName());
        //$pdf->save($destinationPath)->stream('download.pdf');
        file_put_contents($destinationPath."/Consentimiento_".$expediente->folio_expediente.".pdf", $pdf->output());
        //Se le pone el nombre con el cual se descarga el archivo    
        return $pdf -> stream('Consentimiento_informado');

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
