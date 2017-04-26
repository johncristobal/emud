<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /********Vresion 1*********/
        //$libros = Book::all();
        
        /*+++++++Version rawsql+++++++++++*/
        //$libros = \DB::select('select * from books');        
        //Jajajaj nada mas ... de stdclass to array :)
        //$array = json_decode(json_encode($libros), true);
        
        /***********Version query builder*******/
        $libros = \DB::table('books')->get();
        $array = json_decode(json_encode($libros), true);
        return view('libro.todos',['libros' => $array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libro.formlibro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validamos idrectamnte aqui....
        $this->validate($request,[
            'nombre' => 'required|min:5',
            'autor' => 'required|min:8'
        ]);
        
        //SI es correcto, mandamos a modelo a crear libro y redirect a libros con get
        Book::create($request->all());
        return redirect('/libros');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Book::find($id);
        if(!is_null($libro)){
            return view ('libro.mostrar',['libro' => $libro->toArray()]);
        }
        else{
        return response('no encontrado', 404);
        }        
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
