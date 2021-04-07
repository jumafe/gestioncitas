<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obrasocial;
use App\Http\Requests\ValidarObrasocialRequest;


class ObrasocialController extends Controller
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
        $obrasocial = Obrasocial::all();
        return view('obrasocial.index') -> with('obrasocial',$obrasocial);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obrasocial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarObrasocialRequest $request)
    {


        $obrasocial=new Obrasocial();

        $obrasocial->descripcion=$request->get('descripcion');
       
        $obrasocial->estado=$request->get('estado');

        $obrasocial->save();

        return redirect('/obrasocial')->with('message','Guardado Satisfactoriamente !');
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
        $obrasocial = Obrasocial::find($id);
        return view('obrasocial.edit') -> with('obrasocial',$obrasocial);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarObrasocialRequest $request, $id)
    {
        $obrasocial = Obrasocial::find($id);
        
        $obrasocial->descripcion = $request->get('descripcion');
      
        $obrasocial->estado = $request->get('estado');
        $obrasocial->save();

        return redirect('/obrasocial')->with('message','Actualizado Satisfactoriamente !');
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
      
        $obrasocial = Obrasocial::find($id);        
        $obrasocial->delete();
    
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                //$e->getBindings();
                //return redirect('/paciente')->with('message','Tiene dependencias !');
                $message = "El registro que intenta eliminar tiene dependencias";
                return response()->json($message, 500);
            }

        return redirect('/obrasocial')->with('message','Eliminado Satisfactoriamente !');
      
    }



}



