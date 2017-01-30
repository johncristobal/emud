<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clinica;
use App\User;
use App\Alumno;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get clinicas from model and show in view
        $datos['clinicas'] = Clinica::all();
        return view ('Admin.Altaperfil',$datos);
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
        //get data from view and validate it
        $this->validate($request, [
            'nombre' => 'required',
            'correo' => 'required',
            'perfil' => 'required'
        ]);
        
        //Save usuario firdt----thrn alumno        
        $articulo = new User;
	$articulo->name = $request->input('nombre');
	$articulo->correo = $request->input('correo');
        $articulo->rol = $request->input('perfil');
        $articulo->password = $request->input('correo')."123";
        $articulo->created_at = "0";
        $articulo->updated_at = "0";                
	$articulo->save();
        
        //Save now alumno
        //we are goint ti get the clinica from the form
        //status always 1 at beginnig
        if($request->input('perfil') == "2"){
            $alum = new Alumno;
            $alum->matricula = $request->input('matricula');
            $alum->id_usuario = $articulo->id;
            $alum->clinica = 1;
            $alum->status = 1;
            $alum->save();
        }
        
        $datos['usuarios'] = User::all();
        return view('Admin.buscar_usuario',$datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //Get clinicas from model and show in view
        $datos['usuarios'] = User::all();
        return view ('Admin.buscar_usuario',$datos);

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
        //First get the name => just to return it
        $name = User::find($id);
        $affected = User::where('id',$id)->delete();
        if($affected > 0)
        {
            return $name->name;
        }else{
            return 0;
        }
    }
}
