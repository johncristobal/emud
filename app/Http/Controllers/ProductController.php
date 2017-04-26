<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\ProductoRequest;

class ProductController extends Controller
{
    public function crear() {
        return view('producto.create');
    }
    
    public function store(ProductoRequest $request){
        echo 'Estoy usando la Request personalizada ProductoRequest. <br>';
        echo 'No necesito invocar explícitamente las funciones para validar. <br>';
        echo 'Si estoy aquí sé que los datos están validados.<br>';
        dd($request->all());
    }
    
    /*public function store(Request $request){
        echo "Hi<br>";
        
        //Recuperamos valor
        /*
        $nombre = $request->input("nombre");
        echo "<br>";
        echo $nombre;        
        */
        
        //Validamos entrada de datos del formulario
        /*$this->validate($request, [
            'nombre' => 'required|max:255',
            'descrip' => 'required',
            'price' => 'required|numeric',
        ]);*/
        
        /*$validator = Validator::make($request->all(),[
            'nombre' => 'required|max:255',
            'descrip' => 'required',
            'price' => 'required|numeric',
        ]);*/
        
        //echo "<br>Datos validados<br>";

        //Uso de $errores para mostrar errores...global
        
    //}
}
