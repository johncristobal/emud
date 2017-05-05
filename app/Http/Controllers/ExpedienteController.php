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
use App\Patologicos;
use App\Nopatologicos;
use App\Aparatossistemas;
use App\Bucalodinicio;
use App\Bucalodfinal;
use App\Bucalcpod;
use App\Mujeres;
use App\Exploracionfisica;
use App\Resumen;
use App\Notaevolucion;
use \Illuminate\Support\Facades\DB;


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
        $alumno = User::where('rol','=',2)->get();
        $expedientes = Expediente::all();
        $datos['alumnos'] = $alumno;
        $datos['expedientes'] = $expedientes;

        //Load header.blade.php and send to index and every page from provider    
        return view("Admin.transferir_expediente",$datos);
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
        
        //agregar tmb en patologicos....
        $patologico = new Patologicos;
        $patologico->status = 1;
        $patologico->folio_expediente = $Exp->id;
        $patologico->save();
        
        //agregar nopatolgiic
        $pnoatologico = new Nopatologicos;
        $pnoatologico->status = 1;
        $pnoatologico->folio_expediente = $Exp->id;
        $pnoatologico->save();
        
        //cerate aparatos
        $apartos = new Aparatossistemas;
        $apartos->status = 1;
        $apartos->folio_expediente = $Exp->id;
        $apartos->save();
        
        //Emoezamos primeor por higiene bucal...
        $bucalinicio = new Bucalodinicio;
        $bucalinicio->status = 1;
        $bucalinicio->folio_expediente = $Exp->id;
        $bucalinicio->save();
        $bucalfin = new Bucalodfinal;
        $bucalfin->status = 1;
        $bucalfin->folio_expediente = $Exp->id;
        $bucalfin->save();
        $bucalcpod = new Bucalcpod;
        $bucalcpod->status = 1;
        $bucalcpod->folio_expediente = $Exp->id;
        $bucalcpod->save();
                                
        //mujeres
        $mujer = new Mujeres;
        $mujer->status = 1;
        $mujer->folio_expediente = $Exp->id;
        $mujer->save();
        
        //exploracion fiisca
        $fisica = new Exploracionfisica;
        $fisica->status = 1;
        $fisica->folio_expediente = $Exp->id;
        $fisica->save();

        //nueva nota deevolucoi        
        $nota = new Notaevolucion;
        $nota->status = 1;
        $nota->folio_expediente = $Exp->id;
        $nota->save();

        //nueva nota deevolucion
        $resumen = new Resumen;
        $resumen->status = 1;
        $resumen->fecha = date('yyyy-mm-dd');
        $resumen->folio_expediente = $Exp->id;
        $resumen->save();

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
        $idsss = ""; 
        if($request->session()->has(('nombrecom'))){
            $completo = $request->session()->get('nombrecom');
            $idsss = $request->session()->get('iduser');
        }
        
        if ($request->session()->has('folioexpediente')) {
            $request->session()->forget('folioexpediente');
            $request->session()->forget('paciente');
            $request->session()->forget('idexpediente');
            $request->session()->forget('iduser');
            $request->session()->flush();

            $request->session()->put('folioexpediente', $folio[0]->folio_expediente);
            $request->session()->put('paciente', $folio[0]->nombre_paciente);
            $request->session()->put('idexpediente', $id);
            $request->session()->put('nombrecom', $completo);
            $request->session()->put('iduser', $idsss);
        }else{
            $request->session()->put('folioexpediente', $folio[0]->folio_expediente);                    
            $request->session()->put('paciente', $folio[0]->nombre_paciente);
            $request->session()->put('idexpediente', $id);
            $request->session()->put('nombrecom', $completo);
            $request->session()->put('iduser', $idsss);
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
    
    public function verExpedientes(Request $request){
        //$iduser = $correcto[0]->id;
        $iduser = $request->session()->get('iduser','0');
                    
        //recuoero datos del expeidnet con base al ide lde usuario...
        $facturasCliente = DB::table('expediente')
            ->join('alumnos','alumnos.id','=','expediente.id_alumno')
            ->select('expediente.folio_expediente','expediente.nombre_paciente','expediente.fecha_inicio','expediente.id')
            ->where('alumnos.id_usuario', '=', $iduser)
            ->get();

        //$clinica = Expediente::where();
        $datos['data'] = $facturasCliente;

        //Launch view with exoeduente....solo los asociados al alumnos...no todos...
        return view('Alumno.preprincipal',$datos);
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
    
/************************metodos de cada expediente********************/
/************************store/load ficha patologicos********************/
    public function Patologicos(Request $request){
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        
        
        //get dat afrom table patologico...
        //it's a valur with comas...
        //lets make split and get data
        //all in an array,,,like the one before
        
        $data = Patologicos::where('folio_expediente','=',$id)->get();
        //echo $data;
        $enfermedades = ["Varicela","Rubeola","Sarampion","Parotiditis","Tosferina","Escarlatina","Parasitosis","Hepatitis","Sida","Asma","DisfEndocrinas","Hipertensión","Cáncer","ETS","Epilepsias","AmigdalitisdeRepeticion","Tuberculosis","FiebreReumatica","Diabetes","Enfcardiovasculares","Artritis","Traumatismoc/sec","IntQuirurgicas","TransfSangu","Alergias"];

        $arrelgo = array();
        $diferntes = explode(",", $data[0]->enfermedad);
        if(count($diferntes) == 1){
            //no hay datos...va vacio
            foreach ($enfermedades as $value){
                $arrelgo[$value] = "";
            }
            //$arrelgo = "";
        }else{
            //get data from xplode
            foreach ($diferntes as $value) {
                $arrelgo[$value] = $value;
            }
            //$arrelgo = $data[0]->enfermedad;
        }
        
        $datos["variable"] = $arrelgo;        
        $datos["observaciones"] = $data[0]->observaciones;
        
        return view('Alumno.AntescedentesPatologicos',$datos);
    }
    
    public function storePatologico(Request $request){
        $enfermedades = ["Varicela","Rubeola","Sarampion","Parotiditis","Tosferina","Escarlatina","Parasitosis","Hepatitis","Sida","Asma","DisfEndocrinas","Hipertensión","Cáncer","ETS","Epilepsias","AmigdalitisdeRepeticion","Tuberculosis","FiebreReumatica","Diabetes","Enfcardiovasculares","Artritis","Traumatismoc/sec","IntQuirurgicas","TransfSangu","Alergias"];
        $i =0;
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        

        $variable = "";

        foreach ($enfermedades as $value) { 
            $dataaa = $request->input($value); 

            if($dataaa == "on"){                
                $variable .= $value.",";                
            }
        }
        
        $heredo = Patologicos::where('folio_expediente','=',$id)
            ->update(array(
                "enfermedad" => $variable
            ));

        //save dato in the riegh place....;
        $heredo = Patologicos::where('folio_expediente','=',$id)
            ->update(array(
                "observaciones" => $request->input('observaciones')
            ));        

        return redirect('/Expediente/principal');
    }
    
/************************metodos de cada expediente********************/
/************************store/load ficha patologicos********************/
    public function Nopatologicos(Request $request){
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //get dat afrom table patologico...
        //it's a valur with comas...
        //lets make split and get data
        //all in an array,,,like the one before
        
        $data = Nopatologicos::where('folio_expediente','=',$id)->get();
        //echo $data;
        $inmunizaciones = $data[0]->inmunizacion;
        $enfermedades = ["Selecciona","Esquemacompleto","Enproceso","Esquemaincompleto","Ningunadosis","Loignora"];
        $enfermedadesreales = ["Tuberculosis","Poliomielitis (Sabin)","Pentavalente (DPT+HB+HIB)","Difteria, tosferina y tétanos","Sarampión, rubeola y parotiditis","Hepatitis B","Otra"];

        //arreglo[tuberculosis]=valor(enfermedades)
        $arrelgo = array();
        $indice = 0;
        $arregloenfermedad = array();
        $diferntes = explode(",", $inmunizaciones);
        if(count($diferntes) == 1){
            //no hay datos...va vacio
            foreach ($enfermedadesreales as $value){
                $arrelgo[$value] = "Selecciona";
                $indice += 1;
            }
        }else{
            //get data from xplode
            foreach ($diferntes as $value) {
                if($indice == count($enfermedadesreales))
                    break;
                $arrelgo[$enfermedadesreales[$indice]] = $value;
                $indice += 1;
            }
        }
        $datos["variable"] = $arrelgo;

        /*
         * Ahora la siguiente seccion...toxicominas
         */
        $toxiarreglo= ["toxico0","toxico1","toxico2","toxico3"];
        $toxicomanias = $data[0]->toxicominas;
        $arregloaddciones = array();
        
        $i = 0;
        $diferntes2 = explode(",", $toxicomanias);
        if(count($diferntes2) == 1){
            foreach ($toxiarreglo as $value){
                $i += 1;
                $arregloaddciones[$value] = "";
            }
        }else{
            foreach ($diferntes2 as $value) {
                $arregloaddciones[$toxiarreglo[$i]] = $value;
                if($i == count($toxiarreglo)-1)
                    break;
                $i += 1;
            }
        }
        $datos["toxicos"] = $arregloaddciones;

        /*
         * Ahora la siguiente seccion...habutos
         */
        $habitisarreglo= ["habito0","habito1"];
        $habitos = $data[0]->habitos;
        $arregloahabitos = array();
        
        $i = 0;
        $diferntes3 = explode(",", $habitos);
        if(count($diferntes3) == 1){
            foreach ($habitisarreglo as $value){
                $i += 1;
                $arregloahabitos[$value] = "";
            }
        }else{
            foreach ($diferntes3 as $value) {
                $arregloahabitos[$habitisarreglo[$i]] = $value;
                if($i == count($habitisarreglo)-1)
                    break;
                $i += 1;
            }
        }
        $datos["habitos"] = $arregloahabitos;
        
        /*
         * The next one...vivienda
         */
        //echo $data;
        $vivienda = $data[0]->vivienda;
        $enfermedadesreales = ["Vivienda","No de habitaciones en la casa","Personas en la vivienda","Personas en la familia","Personas que trabajan","Personas menores de 15 años"];

        $arrelgo = array();
        $i = 0;
        $arregloenfermedad = array();
        
        $diferntes = explode(",", $vivienda);
        if(count($diferntes) == 1){
            //no hay datos...va vacio
            foreach ($enfermedadesreales as $value) {
                $datos["vivienda".$i] = "";            
                $i += 1;
            }
        }else{
            //get data from xplode
            foreach ($diferntes as $value) {
                if($i == count($enfermedadesreales))
                    break;
                $datos["vivienda".$i] = $value;            
                $i += 1;
            }
        }
        //$datos["vivienda"] = $arrelgo;

        /*
         * Ahora la siguiente seccion...habutos
         */
        $servicios= ["servicio0","servicio1","servicio2","servicio3","servicio4"];
        $habitos = $data[0]->servicios;
        $arregloahabitos = array();
        
        $i = 0;
        $diferntes3 = explode(",", $habitos);
        if(count($diferntes3) == 1){
            foreach ($servicios as $value){
                $i += 1;
                $arregloahabitos[$value] = "";
            }
        }else{
            foreach ($diferntes3 as $value) {
                $arregloahabitos[$servicios[$i]] = $value;
                if($i == count($servicios)-1)
                    break;
                $i += 1;
            }
        }
        $datos["servicios"] = $arregloahabitos;        
        $datos["observacionesss"] = $data[0]->observaciones;;        
        return view('Alumno.AntescedentesNoPatologicos',$datos);
    }
    
    public function storeNopatologico(Request $request){
        $enfermedades = ["Tuberculosis","Poliomielitis(Sabin)","Pentavalente(DPT+HB+HIB)","Difteria,tosferinaytétanos","Sarampión,rubeolayparotiditis","HepatitisB","Otra"];
        $i =0;
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        

        $variable = "";

        foreach ($enfermedades as $value) { 
            $dataaa = $request->input($value); 

            $variable .= $dataaa.",";                
        }
        
        //save dato in the riegh place....;
        $heredo = Nopatologicos::where('folio_expediente','=',$id)
            ->update(array(
                "inmunizacion" => $variable
            ));        

        /*
        //ahora a rescatar los valores de toxicomias
         */
        $habitisarreglo= ["habito0","habito1"];
        $var = "";
        foreach ($habitisarreglo as $value) {
            $dati = $request->input($value);
            //if($dati == "on")
            $var .= $dati.",";
        }
        //save dato in the riegh place....;
        $habit = Nopatologicos::where('folio_expediente','=',$id)
            ->update(array(
                "habitos" => $var
            ));     
        
        /*
        //ahora a rescatar los valores de habitos
         */
        $toxiarreglo= ["toxico0","toxico1","toxico2","toxico3"];
        $var = "";
        foreach ($toxiarreglo as $value) {
            $dati = $request->input($value);
            //if($dati == "on")
            $var .= $dati.",";
        }
        //save dato in the riegh place....;
        $heredo = Nopatologicos::where('folio_expediente','=',$id)
            ->update(array(
                "toxicominas" => $var
            )); 
        
        /*
        //ahora a rescatar los valores de vivienda
         */
        $toxiarreglo= ["vivienda0","vivienda1","vivienda2","vivienda3","vivienda4","vivienda5"];
        $var = "";
        foreach ($toxiarreglo as $value) {
            $dati = $request->input($value);
            //if($dati == "on")
            $var .= $dati.",";
        }
        //save dato in the riegh place....;
        $heredo = Nopatologicos::where('folio_expediente','=',$id)
            ->update(array(
                "vivienda" => $var
            ));         
        
        /*
        //ahora a rescatar los valores de servicios
         */
        $toxiarreglo= ["servicio0","servicio1","servicio2","servicio3","servicio4"];
        $var = "";
        foreach ($toxiarreglo as $value) {
            $dati = $request->input($value);
            //if($dati == "on")
            $var .= $dati.",";
        }
        //save dato in the riegh place....;
        $heredo = Nopatologicos::where('folio_expediente','=',$id)
            ->update(array(
                "servicios" => $var
            ));         
        
        //save dato in the riegh place....;
        $heredo = Nopatologicos::where('folio_expediente','=',$id)
            ->update(array(
                "observaciones" => $request->input('observa')
            ));         

        return redirect('/Expediente/principal');
    }    
    
/************************metodos de cada expediente********************/
/************************store/load ficha patologicos********************/
    public function Aparatos(Request $request){
        
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //get dat afrom table patologico...
        //it's a valur with comas...
        //lets make split and get data
        //all in an array,,,like the one before
        
        $data = Aparatossistemas::where('folio_expediente','=',$id)->get();

        $datos['digestivo'] = $data[0]->digestivo;
        $datos['respiratorio'] = $data[0]->respiratorio;
        $datos['cardiovascular'] = $data[0]->cardiovascular;
        $datos['esqueletico'] = $data[0]->esqueletico;
        $datos['urinario'] = $data[0]->urinario;
        $datos['linfo'] = $data[0]->linfo;
        $datos['endocrino'] = $data[0]->endocrino;
        $datos['nervioso'] = $data[0]->nervioso;
        $datos['tegumentario'] = $data[0]->tegumentario;
        $datos['observaciones'] = $data[0]->observaciones;

        return view ('Alumno.AparatosySistemas',$datos);        
    }
    
    public function storeAparatos(Request $request){
                //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //save dato in the riegh place....;
        $heredo = Aparatossistemas::where('folio_expediente','=',$id)
            ->update(array(
                "digestivo" => $request->input('diges'),
                "respiratorio" => $request->input('resp'),
                "cardiovascular" => $request->input('cardio'),
                "esqueletico" => $request->input('esqle'),
                "urinario" => $request->input('uri'),
                "linfo" => $request->input('linfo'),
                "endocrino" => $request->input('endo'),
                "nervioso" => $request->input('nervi'),
                "tegumentario" => $request->input('tegu'),
                "observaciones" => $request->input('observaciones')
            ));         

        return redirect('/Expediente/principal');        
    }
    
/************************metodos de cada expediente********************/
/************************store/load bucaless********************/
    public function Bucal(Request $request){
        
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        $arreglo = ['vestibular11','vestibular31','vestibular16','vestibular26','lingual36','lingual46'];
        $data = Bucalodinicio::where('folio_expediente','=',$id)->get();

        $valores = array();
        
        //checa el primer valor, si esta vacio, entonces lo demas tambien
        foreach ($arreglo as $value) {
            if($data[0]->$value == ""){
                
                $tempi = $value;
                
                $valores[$tempi."1"] = 0;
                $valores[$tempi."2"] = 0;
            }else{
                $tempi = $value;
                $temp = explode(",",$data[0]->$value);
                $valores[$tempi."1"] = $temp[0];
                $valores[$tempi."2"] = $temp[1];
            }
        }
    
        $datos['valores'] = $valores;
        $fechacorrecta = explode(" ",$data[0]->fecha);
        $datos['fecha1'] = $fechacorrecta[0];
        
        //Cargamos datos de fn.........
        $arreglo = ['vestibularfin11','vestibularfin31','vestibularfin16','vestibularfin26','lingualfin36','lingualfin46'];
        $datafin = Bucalodfinal::where('folio_expediente','=',$id)->get();

        $valores = array();
        
        //checa el primer valor, si esta vacio, entonces lo demas tambien
        foreach ($arreglo as $value) {
            if($datafin[0]->$value == ""){
                
                $tempi = $value;
                
                $valores[$tempi."1"] = 0;
                $valores[$tempi."2"] = 0;
            }else{
                $tempi = $value;
                $temp = explode(",",$datafin[0]->$value);
                $valores[$tempi."1"] = $temp[0];
                $valores[$tempi."2"] = $temp[1];
            }
        }
    
        $datos['finales'] = $valores;
        $fechacorrecta = explode(" ",$datafin[0]->fechafin);
        $datos['fecha2'] = $fechacorrecta[0];
        
        //Cargamos datos de cpod.........
        $arreglo = ['cariados','perdidos','obturados'];
        $datacpod = Bucalcpod::where('folio_expediente','=',$id)->get();

        $valores = array();
        
        $i=1;
        //checa el primer valor, si esta vacio, entonces lo demas tambien
        foreach ($arreglo as $value) {
            if($datacpod[0]->$value == ""){
                
                $tempi = $value;
                
                $datos['cpod'.$i] = 0;
                $i += 1;
                $datos['cpod'.$i] = 0;
                $i += 1;
            }else{
                $tempi = $value;
                $temp = explode(",",$datacpod[0]->$value);
                $datos['cpod'.$i] = $temp[0];
                $i += 1;
                $datos['cpod'.$i] = $temp[1];
                $i += 1;
            }
        }
    
        $datos['total'] = $datacpod[0]->total;
        $datos['observaciones'] = $datacpod[0]->observaciones;
        
        return view ('Alumno.HigieneOral',$datos);
    }
    
    public function storeBucal(Request $request){
                
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        $arreglo = ['vestibular11','vestibular31','vestibular16','vestibular26','lingual36','lingual46'];
        //save dato in the riegh place....---------------------        
        $store = array();
        foreach ($arreglo as $value) {
            $dato1 = $request->input($value."1");
            $dato2 = $request->input($value."2");
            
            $store[$value] = $dato1.",".$dato2;            
        }        
        $store['fecha'] = $request->input('fechainicial');
        $heredo = Bucalodinicio::where('folio_expediente','=',$id)
            ->update($store);

        $arreglo = ['vestibularfin11','vestibularfin31','vestibularfin16','vestibularfin26','lingualfin36','lingualfin46'];

        //save dato in the riegh place....---------------------        
        $store = array();
        foreach ($arreglo as $value) {
            $dato1 = $request->input($value."1");
            $dato2 = $request->input($value."2");
            
            $store[$value] = $dato1.",".$dato2;            
        }
        $store['fechafin'] = $request->input('fechafin');
        $heredo = Bucalodfinal::where('folio_expediente','=',$id)
            ->update($store);      
        
        $arreglo = ['cariados','perdidos','obturados'];
        //save dato in the riegh place....---------------------        
        $store = array();
        $i=1;
        foreach ($arreglo as $value) {
            $dato1 = $request->input("cpod".$i);
            $i += 1;
            $dato2 = $request->input("cpod".$i);
            $i += 1;
            
            $store[$value] = $dato1.",".$dato2;            
        }
            
        $store['total'] = $request->input("dientes");           
        $store['observaciones'] = $request->input("observaciones");           
        
        //save dato in the riegh place....;
        $heredo = Bucalcpod::where('folio_expediente','=',$id)
            ->update($store);   
        
        return redirect('/Expediente/principal');        
    }
    
/************************metodos de cada expediente********************/
/************************store/load bucaless********************/
    public function Mujeres(Request $request){

        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');
        
        $data = Mujeres::where('folio_expediente','=',$id)->get();
        $habitisarreglo = ['menarca','partos','abortos','meno','embarazos','cesa'];
        $sintomas = $data[0]->sintomas;
        $arregloahabitos = array();
        $comas = explode(",", $sintomas);
        
        $i = -1;
        if(count($comas) == 1){
            foreach ($habitisarreglo as $value){
                $i += 1;
                $datos[$value] = "";
            }
        }else{
            foreach ($habitisarreglo as $value){
                $i += 1;
                if(count($habitisarreglo) == $i){break;}
                $datos[$value] = $comas[$i];                
            }
        }
        
        $datos['fechapapa'] = $data[0]->fechapapa;
        $datos['fechames'] = $data[0]->fechames;
        $datos['observaciones'] = $data[0]->observaciones;
        //$datos["sintomas"] = $arregloahabitos;  
        return view ('Alumno.Mujeres',$datos);
    }
    
    public function storeMujeres(Request $request){
        $enfermedades = ['menarca','partos','abortos','meno','embarazos','cesa'];
        $i =0;
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        

        $variable = "";

        foreach ($enfermedades as $value) { 
            $dataaa = $request->input($value); 

            $variable .= $dataaa.",";                
        }
        
        //save dato in the riegh place....;
        $heredo = Mujeres::where('folio_expediente','=',$id)
            ->update(array(
                "sintomas" => $variable,
                "fechapapa" => $request->input('fechapapa'),
                "fechames" => $request->input('fechames'),
                "observaciones" => $request->input('observaciones')
            ));        

        
        
        return redirect('/Expediente/principal');
    }    

/************************metodos de cada expediente********************/
/************************store/load ficha patologicos********************/
    public function Fisica(Request $request){
        
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //get dat afrom table patologico...
        //it's a valur with comas...
        //lets make split and get data
        //all in an array,,,like the one before
        
        $data = Exploracionfisica::where('folio_expediente','=',$id)->get();

        $datos['frenillo'] = $data[0]->frenillo;
        $datos['lengua'] = $data[0]->lengua;
        $datos['lingual'] = $data[0]->lingual;
        $datos['encias'] = $data[0]->encias;
        $datos['paduro'] = $data[0]->paduro;
        $datos['pablando'] = $data[0]->pablando;
        $datos['alveorales'] = $data[0]->alveorales;
        $datos['faringe'] = $data[0]->faringe;
        $datos['boca'] = $data[0]->boca;
        $datos['salival'] = $data[0]->salival;
        $datos['carrillos'] = $data[0]->carrillos;
        $datos['yugal'] = $data[0]->yugal;
        $datos['hallazgos'] = $data[0]->hallazgos;
        $datos['observaciones'] = $data[0]->observaciones;

        return view ('Alumno.ExploracionFisica',$datos);        
    }
    
    public function storeFisica(Request $request){
                //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //save dato in the riegh place....;
        $heredo = Exploracionfisica::where('folio_expediente','=',$id)
            ->update(array(
                "frenillo" => $request->input('frenillo'),
                "lengua" => $request->input('lengua'),
                "lingual" => $request->input('lingual'),
                "encias" => $request->input('encias'),
                "paduro" => $request->input('paduro'),
                "pablando" => $request->input('pablando'),
                "alveorales" => $request->input('alveorales'),
                "faringe" => $request->input('faringe'),
                "boca" => $request->input('boca'),
                "salival" => $request->input('salival'),
                "carrillos" => $request->input('carrillos'),
                "yugal" => $request->input('yugal'),
                "hallazgos" => $request->input('hallazgos'),
                "observaciones" => $request->input('observaciones')
            ));         

        return redirect('/Expediente/principal');        
    }

/************************metodos de cada expediente********************/
/************************store/load ficha patologicos********************/
    public function Notas(Request $request){
        
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //get dat afrom table patologico...
        //it's a valur with comas...
        //lets make split and get data
        //all in an array,,,like the one before
        
        $data = Notaevolucion::where('folio_expediente','=',$id)->get();
        $expediente = Expediente::find($id);

        $datos['fecha'] = explode(" ",$data[0]->fecha)[0];
        $datos['referencia'] = $data[0]->referencia;
        $datos['contraref'] = $data[0]->contraref;
        $datos['nota'] = $data[0]->nota;
                
        $datos['nombre'] = $expediente->nombre_paciente;        
        $datos['edad'] = $expediente->edad;        
        $datos['genero'] = $expediente->genero;        
        $datos['num'] = $expediente->folio_expediente;        

        return view ('Alumno.Nota_evolucion',$datos);        
    }
    
    public function storeNota(Request $request){
                //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //save dato in the riegh place....;
        $heredo = Notaevolucion::where('folio_expediente','=',$id)
            ->update(array(
                "fecha" => $request->input('fecha'),
                "referencia" => $request->input('ref'),
                "contraref" => $request->input('contra'),
                "nota" => $request->input('nota')
            ));         

        return redirect('/Expediente/principal');        
    }
    
/************************metodos de cada expediente********************/
/************************store/load lista con notas********************/
    public function Imagenes(Request $request){
                
        $id = $request->session()->get('idexpediente','0');
        $expediente = Expediente::find($id);

        //read folder and get items..        
        $destinationPath = $expediente->folio_expediente;
        //echo $destinationPath;
        $files = \File::files($destinationPath);//('/uploads');
        
        /*$data = Notaevolucion::where('folio_expediente','=',$id)->get();
        $expediente = Expediente::find($id);

        $arrayt = array();
        
        foreach ($data as $value) {

            $datos['fecha'] = explode(" ",$value->fecha)[0];
            $datos['idnota'] = $value->id;
            $datos['referencia'] = $value->referencia;
            $datos['contraref'] = $value->contraref;
            $datos['nota'] = $value->nota;            
            
            array_push($arrayt,$datos);            
        }*/
        
        $arrayt = array();

        foreach ($files as $filemini)
        {
            $datos['fecha'] = (string)$filemini;
            $datos['idnota'] = (string)$filemini;
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

        return view ('Alumno.principalimagenes',$finalr);   
        
        //get all the images
        //go to folder where the images area saved
        //get the items and show a list in the view        
    } 
    
/************************metodos de cada expediente********************/
/************************store/load ficha patologicos********************/
    public function Resumen(Request $request){
        
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //get dat afrom table patologico...
        //it's a valur with comas...
        //lets make split and get data
        //all in an array,,,like the one before
        
        $data = Resumen::where('folio_expediente','=',$id)->get();
        //$expediente = Expediente::find($id);

        $datos['diagnostico'] = $data[0]->diagnostico;

        return view ('Alumno.Diagnostico_General',$datos);        
    }
    
    public function storeResumen(Request $request){
                //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //save dato in the riegh place....;
        $heredo = Resumen::where('folio_expediente','=',$id)
            ->update(array(
                "diagnostico" => $request->input('diagnostico'),
            ));         

        return redirect('/Expediente/principal');        
    }
    
}
