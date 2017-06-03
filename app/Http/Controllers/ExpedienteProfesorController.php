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

class ExpedienteProfesorController extends Controller
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
    
//******************************ver expediente    
    public function verExpedientesProf(Request $request){
        //$iduser = $correcto[0]->id;
        $iduser = $request->session()->get('iduser','0');
        $request->session()->put('iduser',$iduser);

        //recuoero datos del expeidnet con base al ide lde usuario...
        $facturasCliente = DB::table('expediente')
            ->join('alumnos','alumnos.id','=','expediente.id_alumno')
            ->join('usuarios','usuarios.id','=','alumnos.id_usuario')
            ->select('expediente.folio_expediente','expediente.nombre_paciente','expediente.ap_paterno','expediente.fecha_inicio','expediente.id','usuarios.name','usuarios.pat','expediente.status')
            //->where('alumnos.id_usuario', '=', $iduser)
            ->get();

        //$clinica = Expediente::where();
        $datos['data'] = $facturasCliente;

        //Launch view with exoeduente....solo los asociados al alumnos...no todos...
        return view('Profesor.preprincipal',$datos);        
    }
        
    public function verExpedienteProf(Request $request){
        //Recupero id de la sesion...
        //Busco datos en las tablas...
        //Lanzo a cada view
        //veo principal
        //$valuefolio = $request->session()->get('folioexpediente', 'default');
        $completo = "";
        $idsss = ""; 
        $folio = "";
        $idexped = "";
        if($request->session()->has(('nombrecom'))){
            $completo = $request->session()->get('nombrecom');
            $idsss = $request->session()->get('iduser');
            $folio = $request->session()->get('folioexpediente');
            $idexped = $request->session()->get('idexpediente');
        }

        if ($request->session()->has('folioexpediente')) {
            
            $request->session()->forget('folioexpediente');
            $request->session()->forget('paciente');
            $request->session()->forget('idexpediente');
            $request->session()->forget('iduser');
            $request->session()->flush();

            $request->session()->put('folioexpediente', $folio);
            //save sesion profesor
            $request->session()->put('profesor',"1");
            $request->session()->put('idexpediente', $idexped);
            $request->session()->put('nombrecom', $completo);
            $request->session()->put('iduser', $idsss);
            return view('Profesor.principal');        
        }else{
            return view('/');                
        }        
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
            return view('Profesor.FichaIdentificacion',$datos);
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
        $observa = $request->input('observaprofesor');   //**** we have lo validat the curp

        $expediente = Expediente::find($id);
        //get all the data and save it...
        $expediente->profe_observa = $observa;
        $expediente->status = 4;
        $expediente->save();

        $casi = Direccion::where('folio_expediente','=',$id)->update(array(
            "status" => 4,
        ));
        
        $this->actualizaExpedienteStatus($id);
        
        return redirect('Profesor/Expediente/principal');
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
            
            $observaprofe = $heredo[12]->dato;
            $datos['observacionesprofe'] = $observaprofe;

            return view('Profesor.FamiliaresHederitarios',$datos);
        }
    }
    
    public function storeHeredofam(Request $request){
     
        //guardamos los tipos en una array y los resultado en otro array del miso tmaanio
        //foreahcr del del tispo con foreach del 0 al 6
        //get if(diabetesi is checked) => $datadiabetes = "arrayres[i]"+","
        //before the foreach ends...save data diabetes,arterial,etc...

        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        

        //save dato in the riegh place....;
        $heredo = Heredofamiliares::where('folio_expediente','=',$id)
            ->where('tipo','=','observa_profe')
            ->update(array(
                "dato" => $request->input('observaprofesor')
            ));        
        $heredos = Heredofamiliares::where('folio_expediente','=',$id)
            //->where('tipo','=','observa_profe')
            ->update(array(
                "status" => 4
            ));        
        $this->actualizaExpedienteStatus($id);

        return redirect('Profesor/Expediente/principal');
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
        $datos["observacionesprofe"] = $data[0]->observa_profe;
        
        return view('Profesor.AntescedentesPatologicos',$datos);
    }
    
    public function storePatologico(Request $request){
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        
        
        $heredo = Patologicos::where('folio_expediente','=',$id)
            ->update(array(
                "observa_profe" => $request->input('observaprofesor'),
                "status" => 4
            ));
        $this->actualizaExpedienteStatus($id);

        return redirect('Profesor/Expediente/principal');
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
        $datos["observacionesss"] = $data[0]->observaciones;        
        $datos["observacionesprofe"] = $data[0]->observa_profe;        
        return view('Profesor.AntescedentesNoPatologicos',$datos);
    }
    
    public function storeNopatologico(Request $request){
        //$enfermedades = ["Tuberculosis","Poliomielitis(Sabin)","Pentavalente(DPT+HB+HIB)","Difteria,tosferinaytétanos","Sarampión,rubeolayparotiditis","HepatitisB","Otra"];
        //$i =0;
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        

        /*$variable = "";

        foreach ($enfermedades as $value) { 
            $dataaa = $request->input($value); 

            $variable .= $dataaa.",";                
        }
        
        //save dato in the riegh place....;
        $heredo = Nopatologicos::where('folio_expediente','=',$id)
            ->update(array(
                "inmunizacion" => $variable
            ));        

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
        */
        //save dato in the riegh place....;
        $heredo = Nopatologicos::where('folio_expediente','=',$id)
            ->update(array(
                //"observaciones" => $request->input('observa'),
                "observa_profe" => $request->input('observaprofesor'),
                "status" => 4
            ));
        
        $this->actualizaExpedienteStatus($id);
        
        return redirect('Profesor/Expediente/principal');
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
        $datos['observaprofe'] = $data[0]->observa_profe;

        return view ('Profesor.AparatosySistemas',$datos);        
    }
    
    public function storeAparatos(Request $request){
                //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //save dato in the riegh place....;
        $heredo = Aparatossistemas::where('folio_expediente','=',$id)
            ->update(array(
                /*"digestivo" => $request->input('diges'),
                "respiratorio" => $request->input('resp'),
                "cardiovascular" => $request->input('cardio'),
                "esqueletico" => $request->input('esqle'),
                "urinario" => $request->input('uri'),
                "linfo" => $request->input('linfo'),
                "endocrino" => $request->input('endo'),
                "nervioso" => $request->input('nervi'),
                "tegumentario" => $request->input('tegu'),
                "observaciones" => $request->input('observaciones'),*/
                "observa_profe" => $request->input('observaprofesor'),
                "status" => 4
            ));         

        $this->actualizaExpedienteStatus($id);

        return redirect('Profesor/Expediente/principal');
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
        $datos['observaprofe'] = $data[0]->observa_profe;
        //$datos["sintomas"] = $arregloahabitos;  
        return view ('Profesor.Mujeres',$datos);
    }
    
    public function storeMujeres(Request $request){
        //$enfermedades = ['menarca','partos','abortos','meno','embarazos','cesa'];
        //$i =0;
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');        

        //$variable = "";

        /*foreach ($enfermedades as $value) { 
            $dataaa = $request->input($value); 

            $variable .= $dataaa.",";                
        }*/
        
        //save dato in the riegh place....;
        $heredo = Mujeres::where('folio_expediente','=',$id)
            ->update(array(
                "status" => 4,
                "observa_profe" => $request->input('observaprofesor')
            ));        
        
        $this->actualizaExpedienteStatus($id);

        return redirect('Profesor/Expediente/principal');
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
        $datos['observaprofe'] = $data[0]->observa_profe;

        return view ('Profesor.ExploracionFisica',$datos);        
    }
    
    public function storeFisica(Request $request){
                //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //save dato in the riegh place....;
        $heredo = Exploracionfisica::where('folio_expediente','=',$id)
            ->update(array(
                "status" => 4,
                "observa_profe" => $request->input('observaprofesor')
            ));         

        $this->actualizaExpedienteStatus($id);

        return redirect('Profesor/Expediente/principal');        
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
        $datos['observaprofe'] = $datacpod[0]->observa_profe;
        
        return view ('Profesor.HigieneOral',$datos);
    }
    
    public function storeBucal(Request $request){
                
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        /*$arreglo = ['vestibular11','vestibular31','vestibular16','vestibular26','lingual36','lingual46'];
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
        */
        $store['observa_profe'] = $request->input("observaprofesor");           
        $store['status'] = 4;           
        //save dato in the riegh place....;
        $heredo = Bucalcpod::where('folio_expediente','=',$id)
            ->update($store);   
        
        $this->actualizaExpedienteStatus($id);

        return redirect('Profesor/Expediente/principal');        
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
        $datos['observaprofe'] = $data[0]->observa_profe;

        return view ('Profesor.Diagnostico_General',$datos);        
    }
    
    public function storeResumen(Request $request){
                //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        //save dato in the riegh place....;
        $heredo = Resumen::where('folio_expediente','=',$id)
            ->update(array(
                "status" => 4,
                "observa_profe" => $request->input('observaprofesor'),
            ));         

        $this->actualizaExpedienteStatus($id);
        
        return redirect('Profesor/Expediente/principal');        
    }

/************************mvalidar seccion de expeidente********************/
/************************store/load ficha patologicos********************/
    public function validarSeccion(Request $request){
        $tipo = $request->input('tipo');
        $lastobserva = $request->input('obs');
                
        //session variable to store data
        $id = $request->session()->get('idexpediente','0');
        
        if($tipo == "fichadireccion"){
            //actualizamos tabla direccion unicamnete para definir que ya esta ficha lista
            $direccion = Direccion::where('folio_expediente','=',$id)->update(array(
                "status" => 5,
            ));
            $actualiza = Expediente::where('id','=',$id)->update(array(
                "profe_observa" => $lastobserva
            ));
            
        }
        else if($tipo == "familiares"){            
            //save dato in the riegh place....;
            $heredo = Heredofamiliares::where('folio_expediente','=',$id)
            ->where('tipo','=','observa_profe')
            ->update(array(
                "dato" => $lastobserva
            ));        

            $direccion = Heredofamiliares::where('folio_expediente','=',$id)->update(array(
                "status" => 5,
            ));
        }
        else if($tipo == "patologicos"){            
            $direccion = Patologicos::where('folio_expediente','=',$id)->update(array(
                "observa_profe" => $lastobserva,
                "status" => 5,
            ));
        }else if($tipo == "nopato"){            
            $direccion = Nopatologicos::where('folio_expediente','=',$id)->update(array(
                "observa_profe" => $lastobserva,
                "status" => 5,
            ));
        }else if($tipo == "aparatos"){            
            $direccion = Aparatossistemas::where('folio_expediente','=',$id)->update(array(
                "observa_profe" => $lastobserva,
                "status" => 5,
            ));
        }else if($tipo == "mujeres"){            
            $direccion = Mujeres::where('folio_expediente','=',$id)->update(array(
                "observa_profe" => $lastobserva,
                "status" => 5,
            ));
        }else if($tipo == "fisica"){            
            $direccion = Exploracionfisica::where('folio_expediente','=',$id)->update(array(
                "observa_profe" => $lastobserva,
                "status" => 5,
            ));
        }else if($tipo == "bucal"){            
            $direccion = Bucalcpod::where('folio_expediente','=',$id)->update(array(
                "observa_profe" => $lastobserva,
                "status" => 5,
            ));
        }else if($tipo == "resumen"){            
            $direccion = Resumen::where('folio_expediente','=',$id)->update(array(
                "observa_profe" => $lastobserva,
                "status" => 5,
            ));
        }
        
        return $tipo;
    }

/************************Actualzia expediente a 4********************/
/************************store/load ficha patologicos********************/
    public function actualizaExpedienteStatus($id){
        //session variable to store data
        //$id = $request->session()->get('idexpediente','0');

        $nada = Expediente::where('id','=',$id)->update(array(
            "status" => 4,
        ));
    }
    
    public function validarExpediente(Request $request){
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');
        
        //vas a cada tabla y checas status
        $direccion = Direccion::where('folio_expediente','=',$id)->get();
        $heredo = Heredofamiliares::where('folio_expediente','=',$id)->get();
        $pato = Patologicos::where('folio_expediente','=',$id)->get();
        $patologico = Nopatologicos::where('folio_expediente','=',$id)->get();
        $nopato = Aparatossistemas::where('folio_expediente','=',$id)->get();
        $aparatos = Mujeres::where('folio_expediente','=',$id)->get();
        $mujeres = Exploracionfisica::where('folio_expediente','=',$id)->get();
        $fisica = Bucalcpod::where('folio_expediente','=',$id)->get();
        $bucal = Resumen::where('folio_expediente','=',$id)->get();

        if($direccion[0]->status != 5){
            return "Ficha de identificación";
        }
        if($heredo[0]->status != 5){
            return "Antecedentes heredofamiliares";
        }if($pato[0]->status != 5){
            return "Antecedentes personales patológicos";
        }if($patologico[0]->status != 5){
            return "Antecedentes personales no patológicos";
        }if($nopato[0]->status != 5){
            return "Aparatos y sistemas";
        }if($aparatos[0]->status != 5){
            return "Mujeres";
        }if($mujeres[0]->status != 5){
            return "Exploración física";
        }if($fisica[0]->status != 5){
            return "Higiene oral";
        }if($bucal[0]->status != 5){
            return "Resumen clínico";
        }
        
        return "si";
    }    
    
    public function firmar(){        
        return view('Profesor.firmar');
    }
    
    public function firmarguardar(Request $request){                
        //recuperra ide expedinte
        $id = $request->session()->get('idexpediente','0');

        $firma = $request->input('firma');
        
        $dats = Expediente::where('id','=',$id)->update(array(
           'status' => 5,
            'firma_profe' => $firma
        ));
        
        return 1;
    }
}
