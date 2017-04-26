<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    
    public function recibir(Request $request){
        
        //Identificar si es post o get
        $metodo = $request->method();
        
        //Pregubtar por un metod en particular
        if($request->isMethod("post")){
            echo "This is post method";
        }
        
        //Recuperar datos de un form
        $dato = $request->input("nombre");
        //Recuperar datos de un form por default....un dato
        $dato2 = $request->input("nombre","No");
        
        //Recupera datos de un select y lo guarda en un tipo array;
        //<select name="categorias" multiple>
        //...
        //</select>
        $categorias = $request->input("categorias");
        
        //Saber si se recibe un dato
        if($request->has("edad")){
            
            echo "Tiene edad";
        }
        
        //Recibir datos en espicifo
        $datos_excepto = $request->only("key1","key2");
        
        //Devuelve tooooodos los datos
        $all = $request->all();
        
        //Recuperar tipo file
        $file = $request->file("archivo");
        
       //Comprobar si exite el archivooooo...
        if($request->hasFile("llave")){
            echo "Si tiene archivo";
            $archivo = $request->file("llave");
        }
    }
    
    public function entrada(Request $request){
        
        //Volcado de datos...
        $request->flash();
        
        //Flash todos o algunos
        $request->flashExcept("estenova");
        $request->flashOnly("Solo algunos");
        
        //Comunmente haras algo como esto para edigirir
        return redirect("lifa/de/regreso");
        
        //Hacer todo de una vez-
        //Esto encia todos los datos flasheados
        return redirect("uri")->withInput();
        
        //Tambien puede hacer lo mismo exceptuando algunos datos
        return redirect("uri")->withInput($request->except("name"));

        //Recuoerar datos en el form
        //$request->old("name");
        //simplemente
        //old("name") => Global 
        //<input type="text" name="nombre" value="<?=old('name')>">
        //Valor por defecto
        //old("nombre","valor_por_defecto");
        
    }
    
    
}
