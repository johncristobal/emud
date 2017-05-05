<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notaevolucion;
use App\Expediente;

class NotaController extends Controller
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
    
/************************metodos de cada expediente********************/
/************************store/load lista con notas********************/
    public function Nota(Request $request){
        
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //get all the notas 
        //show list con notass
        //en cada una tendra su clic para ver detalles (usando la functino de Nota)
        //Agregar boton para agregar nota jaja

        $data = Notaevolucion::where('folio_expediente','=',$id)->get();
        $expediente = Expediente::find($id);

        $arrayt = array();
        
        foreach ($data as $value) {

            $datos['fecha'] = explode(" ",$value->fecha)[0];
            $datos['idnota'] = $value->id;
            $datos['referencia'] = $value->referencia;
            $datos['contraref'] = $value->contraref;
            $datos['nota'] = $value->nota;            
            
            array_push($arrayt,$datos);            
        }

        $finalr['data'] = $arrayt;
        /*echo count($arrayt);
        foreach ($arrayt as $value) {
            echo $value['fecha'];
        }*/
        
        //echo $finalr;
        /*$datos['nombre'] = $expediente->nombre_paciente;        
        $datos['edad'] = $expediente->edad;        
        $datos['genero'] = $expediente->genero;        
        $datos['num'] = $expediente->folio_expediente; */       

        return view ('Alumno.principalnotas',$finalr);        
    }
    
    /*
     * Guardar id en sesion y redirgir a principal vuew
     */
    public function guardarid(Request $request,$id){
        //Guardar en seions este id...
        //regreso a principal
        //Salvar en sesion nombre...
        //$folio = Notaevolucion::where('id','=',$id)->get();
        $completo = "";
        $idsss = "";
        $idexped = "";
        
        if($request->session()->has(('nombrecom'))){
            $completo = $request->session()->get('nombrecom');
            $idsss = $request->session()->get('iduser');
            $idexped = $request->session()->get('idexpediente');
        }
        
        if ($request->session()->has('idexpediente')) {
            $request->session()->forget('folioexpediente');
            $request->session()->forget('paciente');
            $request->session()->forget('idexpediente');
            $request->session()->flush();

            $request->session()->put('idexpediente', $idexped);
            $request->session()->put('nombrecom', $completo);
            $request->session()->put('iduser', $idsss);
            $request->session()->put('idnota', $id);
        }else{
            $request->session()->put('idexpediente', $idexped);
            $request->session()->put('nombrecom', $completo);
            $request->session()->put('idnota', $id);
            $request->session()->put('iduser', $idsss);
        }
        return $id;
    }
    
    public function loadimagen(Request $request){
        //return $request->input('id');
        $archivo = $request->input('id');
        
        $file = \File::get($archivo);
        $response = \Response::make($file, 200);
        // using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)
        $response->header('Content-Type', 'application/png');
        //$response->header('Content-Disposition', 'inline; filename="'.$file.'""');

        return $response;
    }
    
/*********************/
/*********************/    
    public function vernota(Request $request){
                
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');
        $idnota = $request->session()->get('idnota','0');

        //get dat afrom table patologico...
        //it's a valur with comas...
        //lets make split and get data
        //all in an array,,,like the one before
        
        $data = Notaevolucion::find($idnota);
        $expediente = Expediente::find($id);

        $datos['fecha'] = explode(" ",$data->fecha)[0];
        $datos['referencia'] = $data->referencia;
        $datos['contraref'] = $data->contraref;
        $datos['nota'] = $data->nota;
                
        $datos['nombre'] = $expediente->nombre_paciente;        
        $datos['edad'] = $expediente->edad;        
        $datos['genero'] = $expediente->genero;        
        $datos['num'] = $expediente->folio_expediente; 
        
        return view ('Alumno.Nota_evolucion_Deta',$datos);        

    }
}
