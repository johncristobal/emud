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
            'ID' => 'required',
            'perfil' => 'required'
        ]);
        
        //Save usuario firdt----thrn alumno        
        $articulo = new User;
	$articulo->name = $request->input('nombre');
	$articulo->correo = "nothing yet";
        $articulo->rol = "2";
        $articulo->password = $request->input('nombre')."123";
        $articulo->created_at = "0";
        $articulo->updated_at = "0";                
	$articulo->save();
        
        //Save now alumno
        //we are goint ti get the clinica from the form
        //status always 1 at beginnig
        $alum = new Alumno;
        $alum->matricula = "identificar";
        $alum->id_usuario = $articulo->id;
        $alum->clinica = 1;
        $alum->status = 1;
        $alum->save();
        
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
