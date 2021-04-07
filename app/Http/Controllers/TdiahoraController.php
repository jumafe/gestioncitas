<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tdiahora;
use App\Models\Profesionales;
use App\Http\Requests\ValidarTdiahoraRequest;
use DB;


class TdiahoraController extends Controller
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
        //
        //$tdiahora = Tdiahora::all();
        $tdiahora = DB::select('SELECT td.id, td.profesional, p.apellido,   
        case td.dia
              when 7 then "Domingo"
              When 1 then "Lunes"
              When 2 then "Martes"
              When 3 then "Miercoles"
              When 4 then "Jueves"
              When 5 then "Viernes"
              When 6 then "Sabado"
              end as dia
                     , td.horainicio, td.horafin
                FROM tdiahoras td, profesionales p
                WHERE td.profesional=p.id');

        return view('tdiahora.index') -> with('tdiahora',$tdiahora);
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

        return view('tdiahora.create', compact('profesionales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarTdiahoraRequest $request)
    {
        //
        $tdiahora=new tdiahora();

        $tdiahora->profesional=$request->get('profesional');
        $tdiahora->dia=$request->get('dia');
        $tdiahora->horainicio=$request->get('horainicio');
        $tdiahora->horafin=$request->get('horafin');
      
        $tdiahora->save();

        return redirect('/tdiahora')->with('message','Guardado Satisfactoriamente !');
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
        $tdiahora = Tdiahora::find($id);
        //return view('profesionales.edit') -> with('profesionales',$profesionales);
       
            $profesionales = DB::table('profesionales')
        ->select('id',
        DB::raw('concat(apellido, " ", nombre) as apellido'))
        ->Where('estado','=',"Activo")
        ->orderBy('apellido','asc')
        ->get();
        
        return view('tdiahora.edit',compact('tdiahora','profesionales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarTdiahoraRequest $request, $id)
    {
        //

        $tdiahora = tdiahora::find($id);
       
        $tdiahora->profesional=$request->get('profesional');
        $tdiahora->dia=$request->get('dia');
        $tdiahora->horainicio=$request->get('horainicio');
        $tdiahora->horafin=$request->get('horafin');

              
        $tdiahora->save();

        return redirect('/tdiahora')->with('message','Actualizado Satisfactoriamente !');

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
        $tdiahora = tdiahora::find($id);        
        $tdiahora->delete();

        return redirect('/tdiahora')->with('message','Eliminado Satisfactoriamente !');
    }
}
