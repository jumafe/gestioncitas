<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesionales;
use App\Models\Tratamiento;
use App\Models\Profesionales_tratamiento;
use App\Http\Requests\ValidarProfesionaltratamientoRequest;
use DB;


class Profesionales_tratamientoController extends Controller
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
        //$profesionales_tratamiento=Profesionales_tratamiento::all();

        $profesionales_tratamiento = DB::select('select pf.id, pf.profesionales_id, p.apellido, pf.tratamiento_id, t.descripcion 
        from profesionales_tratamientos pf, profesionales p, tratamientos t
        where pf.profesionales_id=p.id
        and pf.tratamiento_id=t.id
        order by p.apellido');
              
       // $profesionales=Profesionales::with('tratamientos')->find([3,4,5,6]);

        return view('profesionales_tratamiento.index', compact('profesionales_tratamiento'));

    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $profesionales = DB::table('profesionales')
        ->select('id',
        DB::raw('concat(apellido, " ", nombre) as apellido'))
        ->Where('estado','=',"Activo")
        ->orderBy('apellido','asc')
        ->get();
        
        $tratamiento = Tratamiento::where('estado','=','Activo')
        ->orderBy('descripcion','asc')
        ->get();
        
        return view('profesionales_tratamiento.create', compact('profesionales', 'tratamiento'));
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarProfesionaltratamientoRequest $request)
    {
        //
        $Profesionales_tratamiento=new Profesionales_tratamiento();

        $Profesionales_tratamiento->profesionales_id=$request->get('profesionales_id');
        $Profesionales_tratamiento->tratamiento_id=$request->get('tratamiento_id');
    

        $Profesionales_tratamiento->save();

        return redirect('/profesionales_tratamiento')->with('message','Guardado Satisfactoriamente !');
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
        $profesionales_tratamiento = Profesionales_tratamiento::find($id);
       // dd($Profesionales_tratamiento);
       $profesionales = DB::table('profesionales')
       ->select('id',
       DB::raw('concat(apellido, " ", nombre) as apellido'))
       ->Where('estado','=',"Activo")
       ->orderBy('apellido','asc')
       ->get();
       
       $tratamientos = Tratamiento::where('estado','=','Activo')
       ->orderBy('descripcion','asc')
       ->get();

        return view('profesionales_tratamiento.edit', compact('profesionales_tratamiento','profesionales', 'tratamientos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarProfesionaltratamientoRequest $request, $id)
    {
        //
        $Profesionales_tratamiento = Profesionales_tratamiento::find($id);
        
        $Profesionales_tratamiento->profesionales_id = $request->get('profesionales_id');
        $Profesionales_tratamiento->tratamiento_id = $request->get('tratamiento_id');
        
        $Profesionales_tratamiento->save();

        return redirect('/profesionales_tratamiento')->with('message','Actualizado Satisfactoriamente !');
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
        $Profesionales_tratamiento = Profesionales_tratamiento::find($id);        
        $Profesionales_tratamiento->delete();

        return redirect('/profesionales_tratamiento')->with('message','Eliminado Satisfactoriamente !');
    }
}
