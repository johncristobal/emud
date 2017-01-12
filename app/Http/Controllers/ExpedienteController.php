<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clinica;
use App\User;
use App\Alumno;
use App\Expediente;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Load header.blade.php and send to index and every page from provider

        //*******prueba eloquent***********/List...
        //$clinica = Clinica::all();
        //$datos ['data'] = $clinica;
        //echo $clinica;
        //-------------Recuperando datos usuario
        //$clinica = User::all();
        //$datos ['data'] = $clinica;
        //echo $clinica;

        //-------------Recuperando datos usuario
        /*$clinica = Alumno::all();
        $datos ['data'] = $clinica;
        echo $clinica;*/
        $clinica = Clinica::all();
        $datos ['data'] = $clinica;
        return view("Admin.expediente",$datos);

        /*
            <!--foreach to read data from variable-->
            <?php foreach($data as $item):?>
                clinica: <?=$item['id']?> <br>
                nombre: <?=$item['nombre_clinica']?> <br>
                matricula: <?=$item['matricula_clinica']?> <br>
            <?php endforeach ?>
         */
    }
    
    public function asignar()
    {
        //Load header.blade.php and send to index and every page from provider    
        return view("Admin.asignar_expediente");
    }
    
    public function transferir()
    {
        //Load header.blade.php and send to index and every page from provider    
        return view("Admin.transferir_expediente");
    }

    
    public function buscar()
    {
        //Load header.blade.php and send to index and every page from provider    
        $clinica = Expediente::all();
        $datos['data'] = $clinica;

        return view("Admin.buscar_expediente",$datos);
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
        
        $this->validate($request,[
            'NoExp' => 'required',
            'fechaInicio' => 'required',
            'nombre' => 'required',
            'genero'=> 'required',
            'FechaNac' =>'required',
            'reciboPago' => 'required',
            'reciboDiagn' => 'required', 
            'clinica' => 'required',           
            ]);
        //Creando un expediente y almacenando datos en el objeto
        $Exp= New Expediente;
        $Exp->folio_expediente=$request->input('NoExp');
        $Exp->fecha_inicio=$request->input('fechaInicio');
        $Exp->nombre_paciente=$request->input('nombre');
        $Exp->genero=$request->input('genero');
        $Exp->fecha_nacimimiento=$request->input('FechaNac');
        $Exp->recibo_pago=$request->input('reciboPago');
        $Exp->recibo_diagnostico=$request->input('reciboDiagn');
        //$Exp->id_alumno="1";
        //$Exp->status="02";
        //$Exp->clinica=$request->input('clinica');
        $Exp->save();
        return view('index');

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
        //First get the name
        $name = Expediente::find($id);
        $affected = Expediente::where('id',$id)->delete();
        if($affected > 0)
        {
            return $name->folio_expediente;
        }else{
            return 0;
        }
    }
}
