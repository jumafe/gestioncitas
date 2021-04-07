<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratprof;
use App\Models\Profesionales;
use App\Models\Tratamiento;

class TratprofController extends Controller
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
        $tratprof = tratprof::all();
        $tratamientos = Tratamiento::with(relations:'profesionales')->get();
        //$profesional = Profesionales::all();
               
         return view('tratprof.index', compact('tratprof','tratamientos'));

             
      //  $profesionales = Profesionales::where('id', '=', $tratprof->profe_id)->get();
        //$profesionales = Profesionales::where('id', '=', 3)->get();
      //  return view('tratprof.index') -> with('tratprof',$tratprof);
        
        //    esto va en la variant_date_to_timestamp  
        //    @foreach($profesionales as $profesional)
        //    <td> {{$profesional->nombre}}  </td>
        //    @endforeach   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('tratprof.create');

        $profesionales = Profesionales::all();
        
        $tratamiento = Tratamiento::where('estado','=','Activo')->get();
        return view('tratprof.create', compact('profesionales', 'tratamiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tratprof=new tratprof();

        $tratprof->profe_id=$request->get('profe_id');
        $tratprof->trata_id=$request->get('trata_id');
    

        $tratprof->save();

        return redirect('/tratprof')->with('message','Guardado Satisfactoriamente !');
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

        $tratprof = tratprof::all($id);
      //  $profesionales = Profesionales::all();
       $profesionales = Profesionales::where('id', '=', $tratprof->profe_id)->get();
        //$profesionales = Profesionales::where('id', '=', 3)->get();
        //return view('tratprof.index') -> with('tratprof',$tratprof);
         return view('tratprof.index', compact('tratprof','profesionales'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //$tratprof = tratprof::find($id);
        // return view('tratprof.edit') -> with('tratprof',$tratprof);
        $tratprof = tratprof::find($id);
        $profesionales = Profesionales::all();
        $tratamiento = Tratamiento::all();
        return view('tratprof.edit', compact('tratprof','profesionales', 'tratamiento'));
        
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
        $tratprof = tratprof::find($id);
        
        $tratprof->profe_id = $request->get('profe_id');
        $tratprof->trata_id = $request->get('trata_id');
        
        $tratprof->save();

        return redirect('/tratprof')->with('message','Actualizado Satisfactoriamente !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tratprof = tratprof::find($id);        
        $tratprof->delete();

        return redirect('/tratprof')->with('message','Eliminado Satisfactoriamente !');
    }
}
