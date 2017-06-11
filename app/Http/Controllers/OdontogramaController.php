<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Odontograma;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$diente)
    {   //$diente=18;

        $id=$request->session()->get('idexpediente','0');
        
        $odontogramas=new Odontograma;
        $odontogramas=Odontograma::select('Diagnostico', 'Fecha_Diagnostico', 'Tratamiento','Fecha_Tratamiento')
                ->where('diente','=',$diente)
                ->where('folio_expediente','=',$id)
                ->get();
        //$odontogramas=Odontograma::find($diente)->get();

        if(!is_null($odontogramas))
            //dd($odontogramas);  //vista para revisar los valores del objeto
            return view('Alumno.HistorialDental', compact('odontogramas','diente'));
        else
            return response ('no encontrado', 404);
    }

    public function indexProfe(Request $request,$diente)
    {           
        //$diente=18;
        $id=$request->session()->get('idexpediente','0');

        $odontogramas=new Odontograma;
        $odontogramas=Odontograma::select('Diagnostico', 'Fecha_Diagnostico', 'Tratamiento','Fecha_Tratamiento')
                ->where('diente','=',$diente)
                ->where('folio_expediente','=',$id)
                ->get();
        //$odontogramas=Odontograma::find($diente)->get();

        if(!is_null($odontogramas))
            //dd($odontogramas);  //vista para revisar los valores del objeto
            return view('Profesor.HistorialDental', compact('odontogramas','diente'));
        else
            return response ('no encontrado', 404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Validando los campos del formulario
        $this->validate($request,[
            'diagnostico' => 'required',
            'FechaDiagn' => 'required',
            'tratamiento' => 'required',
            'FechaTratam'=> 'required',                     
            ]);

        $od=new Odontograma;

        $od->diente=$request->input('diente');
        //return response($od->diente);
        $od->Diagnostico=$request->input('diagnostico');
        $od->Fecha_Diagnostico=$request->input('FechaDiagn');
        $od->Tratamiento=$request->input('tratamiento');
        $od->Fecha_Tratamiento=$request->input('FechaTratam');
        
        $od->folio_expediente=$request->session()->get('idexpediente','0');
        
        $od->save();

        //return view('Alumno.Odontograma');

        return redirect('Profesor/Expediente/HigOral/HistorialDental/'.$request->input('diente'));
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
