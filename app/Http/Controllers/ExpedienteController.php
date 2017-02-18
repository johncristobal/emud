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
        
        $folioexpediente = $this->crearfolio();
        
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
    
    public function crearfolio(){
        //get year and get the last tow digits
        date_default_timezone_set('America/Mexico_City');        
        $year = date('Y', time());
        $mont = date('m', time());
        //the actual month => two digits
        echo $year."<br>";
        echo $mont;
        $cade = $year[2].$year[3].$mont;
        echo "jaja: ".$cade."<br>";
        //the importatn thing here...the consecutive....
        //get the last folio created and extract the last three digits...and plus one to it...
        //if doesn't exist...it's cero...
        $lastfolio = "1702001";
        $getlastthree = substr($lastfolio, 4, 3);
        
        echo "digist: ".$getlastthree;
        return 1;
    }


    public function asignar()
    {
        //Load header.blade.php and send to index and every page from provider    
        //Just with rol = 2
        $alumno = User::where('rol','=',2)->get();
        $expedientes = Expediente::all();
        $datos['alumnos'] = $alumno;
        $datos['expedientes'] = $expedientes;

        return view("Admin.asignar_expediente",$datos);
    }
    
    public function reasignar(Request $request){
     
        $idusuario = $request->input('estudiante');
        $idexpeidnete = $request->input('exped');

        //Apartir del idusuario recuperamos idalumno
        $alumno = Alumno::where('id_usuario','=',$idusuario)->get();
        $idal = $alumno[0]->id;

        //Asigamos idalumno a expeidnte
        $expe = Expediente::find($idexpeidnete);
        $expe->id_alumno = $idal;
        $expe->status = "1";
        $expe->save();
        
        //regresamos
        return view('indexAdmin');
        
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
            'paterno' => 'required',
            'materno' => 'required',
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
        $Exp->ap_paterno=$request->input('paterno');
        $Exp->ap_materno=$request->input('materno');
        $Exp->genero=$request->input('genero');
        $Exp->fecha_nacimimiento=$request->input('FechaNac');
        $Exp->recibo_pago=$request->input('reciboPago');
        $Exp->recibo_diagnostico=$request->input('reciboDiagn');
        $Exp->id_alumno="1";
        //Recuerda que estatus 2 es "no activo" y uando se aseigna hay q actalziarlo
        $Exp->status="2";
        $Exp->clinica=$request->input('clinica');
        $Exp->save();
        return view('indexAdmin');

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
    
    /*
     * Guardar id en sesion y redirgir a principal vuew
     */
    public function guardarid($id){
        //Guardar en seions este id...
        //regreso a principal
        return 1;
    }
    
    /*
     * lANCA view con expeidnets y sus registrops
     */
    public function verExpediente(){
        //Recupero id de la sesion...
        //Busco datos en las tablas...
        //Lanzo a cada view
        //veo principal
        
        return view('Alumno.principal');
    }
    
}
