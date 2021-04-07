<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feriado;
use App\Http\Requests\ValidarFeriadoRequest;

class FeriadoController extends Controller
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
        $feriados = Feriado::all();
        return view('feriado.index') -> with('feriados',$feriados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('feriado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarFeriadoRequest $request)
    {
        $feriados=new Feriado();

        
        $feriados->dia=$request->get('dia');
       
        $feriados->descripcion=$request->get('descripcion');
      
        $feriados->save();

        return redirect('/feriado')->with('message','Guardado Satisfactoriamente !');
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
         $feriados = Feriado::find($id);
        
         return view('feriado.edit',compact('feriados','feriados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarFeriadoRequest $request, $id)
    {
        $feriados = Feriado::find($id);
             
        $feriados->dia=$request->get('dia');
       
        $feriados->descripcion=$request->get('descripcion');
               
        $feriados->save();

        return redirect('/feriado')->with('message','Actualizado Satisfactoriamente !');
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
        $feriados = Feriado::find($id);        
        $feriados->delete();

        return redirect('/feriado')->with('message','Eliminado Satisfactoriamente !');
    }
}
