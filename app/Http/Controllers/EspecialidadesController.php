<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidades;
use App\Http\Requests\ValidarEspecialidadesRequest;


class EspecialidadesController extends Controller
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
        $especialidades = Especialidades::all();
        return view('especialidades.index') -> with('especialidades',$especialidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarEspecialidadesRequest $request)
    {
        $especialidades=new especialidades();

        $especialidades->descripcion=$request->get('descripcion');
        $especialidades->estado=$request->get('estado');

        $especialidades->save();

        return redirect('/especialidades')->with('message','Guardado Satisfactoriamente !');
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
        $especialidades = especialidades::find($id);
        return view('especialidades.edit') -> with('especialidades',$especialidades);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarEspecialidadesRequest $request, $id)
    {
        $especialidades = especialidades::find($id);
        
        $especialidades->descripcion = $request->get('descripcion');
        $especialidades->estado = $request->get('estado');
        $especialidades->save();

        return redirect('/especialidades')->with('message','Actualizado Satisfactoriamente !');
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
        
            $especialidades = especialidades::find($id);        
        $especialidades->delete();
       
  
        }
       catch(\Illuminate\Database\QueryException $e)
       {
           //$e->getBindings();
           //return redirect('/paciente')->with('message','Tiene dependencias !');
           $message = "El registro que intenta eliminar tiene dependencias";
           return response()->json($message, 500);
       }

        return redirect('/especialidades')->with('message','Eliminado Satisfactoriamente !');
    }
}
