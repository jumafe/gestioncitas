<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamiento;
use App\Http\Requests\ValidarTratamientoRequest;


class TratamientoController extends Controller
{

    public function __construct()
    {
        $this ->middleware('auth');
     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tratamiento = Tratamiento::all();
        return view('tratamiento.index') -> with('tratamiento',$tratamiento);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tratamiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarTratamientoRequest $request)
    {
        $tratamiento=new tratamiento();

        $tratamiento->descripcion=$request->get('descripcion');
        $tratamiento->duracion=$request->get('duracion');
        $tratamiento->estado=$request->get('estado');

        $tratamiento->save();

        return redirect('/tratamiento')->with('message','Guardado Satisfactoriamente !');
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
        $tratamiento = Tratamiento::find($id);
        return view('tratamiento.edit') -> with('tratamiento',$tratamiento);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarTratamientoRequest $request, $id)
    {
        $tratamiento = Tratamiento::find($id);
        
        $tratamiento->descripcion = $request->get('descripcion');
        $tratamiento->duracion=$request->get('duracion');
        $tratamiento->estado = $request->get('estado');
        $tratamiento->save();

        return redirect('/tratamiento')->with('message','Actualizado Satisfactoriamente !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try { 
               
         $tratamiento = Tratamiento::find($id);        
        $tratamiento->delete();
   
  
        }
       catch(\Illuminate\Database\QueryException $e)
       {
           //$e->getBindings();
           //return redirect('/paciente')->with('message','Tiene dependencias !');
           $message = "El registro que intenta eliminar tiene dependencias";
           return response()->json($message, 500);
       }

        return redirect('/tratamiento')->with('message','Eliminado Satisfactoriamente !');
    }
}
