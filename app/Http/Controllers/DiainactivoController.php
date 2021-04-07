<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diainactivo;
use App\Models\Profesionales;
use DB;
use App\Http\Requests\ValidarDiainactivoRequest;

class DiainactivoController extends Controller
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
            $diainactivos = DB::select('SELECT d.id, d.profesional, p.apellido,   
                         d.diadesde, d.descripcion
                    FROM diainactivos d, profesionales p
                    WHERE d.profesional=p.id order by p.apellido, d.diadesde asc');
    
            return view('diainactivo.index') -> with('diainactivos',$diainactivos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesionales = DB::table('profesionales')
        ->select('id',
        DB::raw('concat(apellido, " ", nombre) as apellido'))
        ->Where('estado','=',"Activo")
        ->orderBy('apellido','asc')
        ->get();

        return view('diainactivo.create', compact('profesionales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarDiainactivoRequest $request)
    {
        $diainactivos=new Diainactivo();

        $diainactivos->profesional=$request->get('profesional');
        $diainactivos->diadesde=$request->get('diadesde');
       
        $diainactivos->descripcion=$request->get('descripcion');
      
        $diainactivos->save();

        return redirect('/diainactivo')->with('message','Guardado Satisfactoriamente !');
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
         $diainactivos = Diainactivo::find($id);
         
         $profesionales = DB::table('profesionales')
         ->select('id',
         DB::raw('concat(apellido, " ", nombre) as apellido'))
         ->Where('estado','=',"Activo")
         ->orderBy('apellido','asc')
         ->get();
         
         return view('diainactivo.edit',compact('diainactivos','profesionales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarDiainactivoRequest $request, $id)
    {
        $diainactivos = Diainactivo::find($id);
             
        $diainactivos->diadesde=$request->get('diadesde');
       
        $diainactivos->descripcion=$request->get('descripcion');
        $diainactivos->profesional=$request->get('profesional');
       
        $diainactivos->save();

        return redirect('/diainactivo')->with('message','Actualizado Satisfactoriamente !');
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
        $diainactivos = Diainactivo::find($id);        
        $diainactivos->delete();

        return redirect('/diainactivo')->with('message','Eliminado Satisfactoriamente !');
    }
}
