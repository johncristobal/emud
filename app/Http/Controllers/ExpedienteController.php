<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clinica;
use App\User;
use App\Alumno;
use App\Expediente;
use App\Direccion;
use App\Responsable;
use App\Datosconsulta;

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
        $datos ['folio'] = $folioexpediente;
        
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
        //echo $year."<br>";
        //echo $mont;
        $cade = $year[2].$year[3].$mont;
        //echo "jaja: ".$cade."<br>";
        //the importatn thing here...the consecutive....
        //get the last folio created and extract the last three digits...and plus one to it...
        //if doesn't exist...it's cero...
        $lastrow = Expediente::orderBy('id','desc')->take(1)->get(['folio_expediente']);
        $lastfolio = "";
        $nuevofolio = "";
        if($lastrow->isEmpty()){
            //echo $lastrow;
            $lastfolio = "1212000";
            $nuevofolio = substr($lastfolio, 4, 3);
            //echo "vacio";
        }else{
            //echo $lastrow;
            $lastfolio= $lastrow[0]->folio_expediente;
            $getlastthree = substr($lastfolio, 4, 3);
            $getlastthree += 1;
            $tamanio = strlen($getlastthree);
            //echo $tamanio;
            if($tamanio == 1){
                $nuevofolio = "00".$getlastthree;
            }else if($tamanio == 2){
                $nuevofolio = "0".$getlastthree;                
            }else {
                $nuevofolio = $getlastthree;                
            }
            //si el dato tiene solo un digito...concateno 00
            //si tiene dos ...conateno 0
            //si tiene tres...no concateno
        }
        //$lastfolio = "1702001";
        
        //echo "digist: ".$getlastthree;
        return $cade.$nuevofolio;
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
        
        //We have to create and store all the other tables...
        //With status x to set that they are not completed
        $direccion = new Direccion;
        $direccion->status = 1;
        $direccion->folio_expediente = $Exp->id; 
        $direccion->save();
        $responsable = new Responsable;
        $responsable->folio_expediente = $Exp->id;
        $responsable->status = 1;        
        $responsable->save();                
        $datosconsulta = new Datosconsulta;
        $datosconsulta->folio_expediente = $Exp->id;
        $datosconsulta->status = 1;
        $datosconsulta->save();
        
        //return view
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
    public function guardarid(Request $request,$id){
        //Guardar en seions este id...
        //regreso a principal
        //Salvar en sesion nombre...
        $folio = Expediente::where('id','=',$id)->get(['folio_expediente','nombre_paciente']);
        $completo = "";
        if($request->session()->has(('nombrecom'))){
            $completo = $request->session()->get('nombrecom');
        }
        
        if ($request->session()->has('folioexpediente')) {
            $request->session()->forget('folioexpediente');
            $request->session()->forget('paciente');
            $request->session()->forget('idexpediente');
            $request->session()->flush();

            $request->session()->put('folioexpediente', $folio[0]->folio_expediente);
            $request->session()->put('paciente', $folio[0]->nombre_paciente);
            $request->session()->put('idexpediente', $id);
            $request->session()->put('nombrecom', $completo);
        }else{
            $request->session()->put('folioexpediente', $folio[0]->folio_expediente);                    
            $request->session()->put('paciente', $folio[0]->nombre_paciente);
            $request->session()->put('idexpediente', $id);
            $request->session()->put('nombrecom', $completo);
        }
        return $id;
    }
    
    /*
     * lANCA view con expeidnets y sus registrops
     */
    public function verExpediente(Request $request){
        //Recupero id de la sesion...
        //Busco datos en las tablas...
        //Lanzo a cada view
        //veo principal
        //$valuefolio = $request->session()->get('folioexpediente', 'default');
        
        return view('Alumno.principal');
    }

/************************metodos de cada expediente********************/
/************************store/load ficha********************/
    public function FichaExp(Request $request){
        //cargo autoload form
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');
        
        //echo $id;
        if($id == '0'){
            echo "sin sesion";
        }else{
            //si tiene id....recuoeramos datos para lanzarlos...
            $expediente = Expediente::find($id);
            $datos['expediente'] = $expediente;

            //echo $id;
            //get info from direction...
            $direccion = Direccion::where('folio_expediente','=',$id)->get();
            $datos['direccion'] = $direccion;
            /*
             * y AHORA  que pex...como diablos resuelvo esto
             * Si esta vaciaa...el 0 truena... :)(
             */
            //GET data from responsable table
            $responsable = Responsable::where('folio_expediente','=',$id)->get();
            $datos['responsable'] = $responsable;

            //GET data from responsable table
            $datosconsulta = Datosconsulta::where('folio_expediente','=',$id)->get();
            $datos['datosconsulta'] = $datosconsulta;
                        
            //validamos para enviar id religion
            //$idreligion = $this->getReligion($expediente);
            //$expediente->idreligion = $idreligion;
            
            $clinica = Clinica::find($expediente->clinica);
            $datos['clinica'] = $clinica->nombre_clinica;
            return view('Alumno.FichaIdentificacion',$datos);
        }
    }
    
    public function storeFicha(Request $request){
        //we have to get all the info from the view
        //validate them
        //and store in database...
        //remember => we have already the folio expeidnete...
        //so, lets make a kind of update
        
        //session variable to store data
        $id = $request->session()->get('idexpediente','0');
        
        //get data from expediente
        $curp = $request->input('curp');   //**** we have lo validat the curp
        $foto = $request->input('fotografia');    //***** we have to load the picture to the server
        $ocupacion = $request->input('Ocupacion'); 
        $escolaridad = $request->input('escolaridad'); 
        $edocivil = $request->input('edoCivil'); 
        $religion = $request->input('Religion'); 
        $lugarnacimiento = $request->input('lugarNac'); 
        $expediente = Expediente::find($id);
        //get all the data and save it...
        $expediente->curp = $curp;
        $expediente->ocupacion = $ocupacion;
        $expediente->estadocivil = $edocivil;
        $expediente->escolaridad = $escolaridad;
        $expediente->religion = $religion;
        $expediente->lugar_nacimiento = $lugarnacimiento;
        $expediente->fotopath = $foto;  //hay que ver que onda con la foto....        
        $expediente->save();
        
        //direccion
        $calle = $request->input('CalleNum'); 
        $numero = $request->input('numerohouse'); 
        $codigopostal = $request->input('CodPostal'); 
        $colonia = $request->input('Colonia'); 
        $delegacion = $request->input('Municipio'); 
        $entidad = $request->input('estado'); 
        $telefono= $request->input('Telefono'); 
        $idh= $request->input('institucion'); 
        $direccion = Direccion::where('folio_expediente','=',$id)->update(array(
        "calle" => $calle,
        "numero" => $numero,
        "codigopostal" => $codigopostal,
        "colonia" => $colonia,
        "delegacion" => $delegacion,
        "entidad" => $entidad,
        "telefono" => $telefono,
        "idh" => $idh
        ));
        
        //responsable
        $responsable = Responsable::where('folio_expediente','=',$id)->update(array(
        "paterno"=> $request->input('APat'),
        "materno"=> $request->input('AMat'), 
        "nombre"=> $request->input('Nombre'), 
        "telefono"=> $request->input('TelAux') 
        ));
        
        //datos sobre consutla
        $datosconsulta = Datosconsulta::where('folio_expediente','=',$id)->update(array(
            "motivo" => $request->input('MotivoCons'),
            "nota_ingreso"=> $request->input('Notaingreso'), 
            "alergia"=> $request->input('Alertaalergia'), 
            "somatria"=> $request->input('signosvilates'), 
            "estatura"=> $request->input('Estatura'),
            "peso"=> $request->input('Peso'),
            "pulso"=> $request->input('Pulso'), 
            "frecuencia"=> $request->input('FrecResp'), 
            "tension"=> $request->input('Tensionarterial'), 
            "temperatura"=> $request->input('Temperatura'), 
            "sanguineo"=> $request->input('Sanguineo')       
        ));
        
        return redirect('/Expediente/principal');
    }
    //We need tue id or the religion...but we dont have a catalog....it's not necesary
    //so, just get the id in this way...whit a method
    /*public function getReligion($dato){
        if($dato->religion == "Catolica"){
            return 0;
        }else if($dato->religion == "Cristiana"){
            return 1;
        }else if($dato->religion == "Mormona"){
            return 2;
        }else if($dato->religion == "Budista"){
            return 3;
        }else if($dato->religion == "Otro"){
            return 4;
        }else{
            return 100;
        }
    }*/
}
