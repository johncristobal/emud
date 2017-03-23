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
use App\Heredofamiliares;

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
        
        //heredofamiliares
        $heredo = new Heredofamiliares;
        $heredo->status = 1;
        $heredo->folio_expediente = $Exp->id; 
        $heredo->tipo = "diabetes";
        $heredo->save();
        $heredo2 = new Heredofamiliares;
        $heredo2->status = 1;
        $heredo2->folio_expediente = $Exp->id; 
        $heredo2->tipo = "arterial";
        $heredo2->save();
        $heredo3 = new Heredofamiliares;
        $heredo3->status = 1;
        $heredo3->folio_expediente = $Exp->id; 
        $heredo3->tipo = "cardiopatias";
        $heredo3->save();
        $heredo4 = new Heredofamiliares;
        $heredo4->status = 1;
        $heredo4->folio_expediente = $Exp->id; 
        $heredo4->tipo = "neoplasias";
        $heredo4->save();
        $heredo5 = new Heredofamiliares;
        $heredo5->status = 1;
        $heredo5->folio_expediente = $Exp->id; 
        $heredo5->tipo = "epilepsias";
        $heredo5->save();
        $heredo6 = new Heredofamiliares;
        $heredo6->status = 1;
        $heredo6->folio_expediente = $Exp->id; 
        $heredo6->tipo = "malformaciones";
        $heredo6->save();
        $heredo7 = new Heredofamiliares;
        $heredo7->status = 1;
        $heredo7->folio_expediente = $Exp->id; 
        $heredo7->tipo = "sida";
        $heredo7->save();
        $heredo8 = new Heredofamiliares;
        $heredo8->status = 1;
        $heredo8->folio_expediente = $Exp->id; 
        $heredo8->tipo = "renales";
        $heredo8->save();
        $heredo9 = new Heredofamiliares;
        $heredo9->status = 1;
        $heredo9->folio_expediente = $Exp->id; 
        $heredo9->tipo = "hepatitis";
        $heredo9->save();
        $heredo10 = new Heredofamiliares;
        $heredo10->status = 1;
        $heredo10->folio_expediente = $Exp->id; 
        $heredo10->tipo = "artritis";
        $heredo10->save();
        $heredo11 = new Heredofamiliares;
        $heredo11->status = 1;
        $heredo11->folio_expediente = $Exp->id; 
        $heredo11->tipo = "otra";
        $heredo11->save();
        $heredo12 = new Heredofamiliares;
        $heredo12->status = 1;
        $heredo12->folio_expediente = $Exp->id; 
        $heredo12->tipo = "observaciones";
        $heredo12->save();

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
            $fecha1 = explode(" ", $expediente->fecha_inicio);
            $datos['fecha1'] = $fecha1[0];
            $fecha2 = explode(" ", $expediente->fecha_nacimimiento);
            $datos['fecha2'] = $fecha2[0];

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
        $fechanac = $request->input('FechaNac'); 
        $eddda = $request->input('Edad'); 
        $expediente = Expediente::find($id);
        //get all the data and save it...
        $expediente->curp = $curp;
        $expediente->ocupacion = $ocupacion;
        $expediente->estadocivil = $edocivil;
        $expediente->escolaridad = $escolaridad;
        $expediente->religion = $religion;
        $expediente->lugar_nacimiento = $lugarnacimiento;
        $expediente->fecha_nacimimiento = $fechanac;
        $expediente->edad = $eddda;
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
/************************metodos de cada expediente********************/
/************************store/load ficha********************/
    public function Heredofami(Request $request){
        
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        
        
        if($id == '0'){
            echo "sin sesion";
        }else{
            //get all data from heredofami
            $heredo = Heredofamiliares::where('folio_expediente','=',$id)->get();

            $arreglo = array();
            for($i=0;$i<11;$i++){
                $arrydiabetes = array();
                $diabetes = explode(",", $heredo[$i]->dato);
                if(count($diabetes) == 1){
                    //echo "sin datos";
                    $arrydiabetes["madre"]="";
                    $arrydiabetes["padre"]="";
                    $arrydiabetes["hermano"]="";
                    $arrydiabetes["abuela"]="";
                    $arrydiabetes["abuelo"]="";
                    $arrydiabetes["otro"]="";

                    $arreglo[$heredo[$i]->tipo] = $arrydiabetes;
                    //array_push($arrydiabetes,$arreglo);

                }else{
                    //foreach de diabetes...
                    //validamos los datos...>if diabtes[i]=="madre|padre|..etc"
                    //guardamos ese valor...>$daibetesaray = array(); $diabetesarray["madre"] = "si"|"madre"| o algo asi...
                    //else...>no tiene dato entonces $diabetesarray["mapdre"] = ""
                    //validar en view si tiene dato, entonces set checked true

                    foreach ($diabetes as $value) {
                        $arrydiabetes[$value] = $value;
                    }
                    $arreglo[$heredo[$i]->tipo] = $arrydiabetes;
                    //array_push($arrydiabetes,$arreglo);
                }
            }
            
            $datos['variable'] = $arreglo;

            $observa = $heredo[11]->dato;
            $datos['observaciones'] = $observa;
            
            return view('Alumno.FamiliaresHederitarios',$datos);
        }
    }
    
    public function storeHeredofam(Request $request){
     
        //guardamos los tipos en una array y los resultado en otro array del miso tmaanio
        //foreahcr del del tispo con foreach del 0 al 6
        //get if(diabetesi is checked) => $datadiabetes = "arrayres[i]"+","
        //before the foreach ends...save data diabetes,arterial,etc...

        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        

        $variable = "";
        $i =0;
        $tipos = ["diabetes","arterial","cardiopatias","neoplasias","epilepsias","malformaciones","sida","renales","hepatitis","artritis","otra"];//,'padre','hermano','abuela','abuela','otro'];
        $names = ["madre","padre","hermano","abuela","abuelo","otro"];
        
        foreach ($tipos as $value) {
            foreach ($names as $clave){
                $cto = $value."$i";
                $dataaa = $request->input($cto); 
                
                //echo "diabetes0:".$dataaa."---";
                if($dataaa == "on"){
                    $variable .= $clave.",";
                //    echo $cto."<br>";
                }
                $i += 1;
            }
            
            $i = 0;
            //save dato in the riegh place....;
            $heredo = Heredofamiliares::where('folio_expediente','=',$id)
                ->where('tipo','=',$value)
                ->update(array(
                    "dato" => $variable
                ));
                        
            $variable = "";
        }

        //save dato in the riegh place....;
        $heredo = Heredofamiliares::where('folio_expediente','=',$id)
            ->where('tipo','=','observaciones')
            ->update(array(
                "dato" => $request->input('observaciones')
            ));        

        return redirect('/Expediente/principal');

    }   
}
