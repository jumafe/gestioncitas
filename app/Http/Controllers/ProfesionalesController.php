<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesionales;
use App\Models\Especialidades;
use App\Http\Requests\ValidarProfesionalRequest;


class ProfesionalesController extends Controller
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
        $profesionales = Profesionales::all();
        return view('profesionales.index') -> with('profesionales',$profesionales);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
       
        $especialidades = Especialidades::where('estado','=','Activo')->get();
        return view('profesionales.create', compact('especialidades'));

       
        //return view('profesionales.create');

        
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarProfesionalRequest $request)
    {
        $profesionales=new profesionales();

        $profesionales->apellido=$request->get('apellido');
        $profesionales->nombre=$request->get('nombre');
        $profesionales->telefono1=$request->get('telefono1');
        $profesionales->telefono2=$request->get('telefono2');
        $profesionales->email=$request->get('email');
       // $profesionales->doctor=$request->get('doctor');
        $profesionales->especialidad=$request->get('especialidad');
        $profesionales->intervalos=$request->get('intervalos');
        $profesionales->sobreturno=$request->get('sobreturno');
      //  $profesionales->hssobreturno=$request->get('hssobreturno');
        $profesionales->sobreturnoe=$request->get('sobreturnoe');
       // $profesionales->hssobreturnoe=$request->get('hssobreturnoe');
        $profesionales->practicas=$request->get('practicas');
       // $profesionales->hspracticas=$request->get('hspracticas');
        $profesionales->estado=$request->get('estado');

        $profesionales->save();

        return redirect('/profesionales')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesionales = Profesionales::find($id);
      
        $especialidades = Especialidades::where('estado','=','Activo')->get();
        
        return view('profesionales.show',compact('profesionales','especialidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesionales = Profesionales::find($id);
      
        $especialidades = Especialidades::where('estado','=','Activo')->get();
        
        return view('profesionales.edit',compact('profesionales','especialidades'));

    }

    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarProfesionalRequest $request, $id)
    {
        $profesionales = Profesionales::find($id);
       
        $profesionales->apellido=$request->get('apellido');
        $profesionales->nombre=$request->get('nombre');
        $profesionales->telefono1=$request->get('telefono1');
        $profesionales->telefono2=$request->get('telefono2');
        $profesionales->email=$request->get('email');
     //   $profesionales->doctor=$request->get('doctor');
        $profesionales->especialidad=$request->get('especialidad');
        $profesionales->intervalos=$request->get('intervalos');
        $profesionales->sobreturno=$request->get('sobreturno');
      //  $profesionales->hssobreturno=$request->get('hssobreturno');
        $profesionales->sobreturnoe=$request->get('sobreturnoe');
       // $profesionales->hssobreturnoe=$request->get('hssobreturnoe');
        $profesionales->practicas=$request->get('practicas');
       // $profesionales->hspracticas=$request->get('hspracticas');
        $profesionales->estado=$request->get('estado');
       
        $profesionales->save();

        return redirect('/profesionales')->with('message','Actualizado Satisfactoriamente !');
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
            
        $profesionales = profesionales::find($id);        
        $profesionales->delete();

  
        }
       catch(\Illuminate\Database\QueryException $e)
       {
           //$e->getBindings();
           //return redirect('/paciente')->with('message','Tiene dependencias !');
           $message = "El registro que intenta eliminar tiene dependencias";
           return response()->json($message, 500);
       }

        return redirect('/profesionales')->with('message','Eliminado Satisfactoriamente !');
    }
}
