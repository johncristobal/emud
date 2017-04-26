<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;
use App\Datosconsulta;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Alumno.Receta');
    }

    //Metodo que se encarga de generar la receta en formato pdf
    public function invoice(Request $request)
    {           
        //jalamos el id de la sesion
        //$id = $request->session()->get('idexpediente','0');
        $id = $request->session()->get('idexpediente','0');        

        //ORM que jala los datos de la bd                 
        $expediente= Expediente::select('nombre_paciente', 'ap_paterno', 'ap_materno','edad')->where('id','=',$id)->first();
        //dd($expediente);
        $consulta= Datosconsulta::select('temperatura', 'tension','peso','frecuencia')->where('folio_expediente','=',$id)->first();
        //dd($consulta);  
        
        //Validamos los campos del formulario
         $this->validate($request,[
            'id' => 'required',
            'areaatencion' => 'required',
            'preescripcion'=> 'required',
            'indicaciones' =>'required',
            'observaciones' => 'required',                       
            ]);

        //Variables que se usan para el nombre completo del usuario  
        $nombre=$expediente->nombre_paciente;
        $ap_p=$expediente->ap_paterno;
        $ap_m=$expediente->ap_materno;

        //Variable que contiene el nombre completo del usuario
        $name=$nombre.' '.$ap_p.' '.$ap_m;
        $date = date('d-m-Y');
        $invoice = "Receta de prueba";

         //Obteniendo los datos del formulario
        $id_rec=$request->input('id');
        $areaA=$request->input('areaatencion');
        $preesc=$request->input('preescripcion');
        $ind =$request->input('indicaciones');
        $observ=$request->input('observaciones');
        
        //Manda a llamar el html que generara el pdf, se envian las variables a usar en el pdf
        $view = \View::make('Alumno.invoice', compact('expediente', 'consulta', 'invoice', 'name','date',
                                                        'id_rec','areaA','preesc','ind','observ'))->render();

        //Construye el pdf
        $pdf = \App::make('dompdf.wrapper');
        //Se usa para cargar el pdf en el navegador
        $pdf -> loadHTML($view);        
        //Se le pone el nombre con el cual se descarga el archivo    
        return $pdf->stream('Receta_Paciente');

    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
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
