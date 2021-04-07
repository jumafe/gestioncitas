<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesionales;
use App\Models\Tdiahora;
use DB;

session_start();
$_SESSION['ipaciente'] =null;

class IturnoController extends Controller
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
    
       $profesionales = DB::table('turnos as t')
       ->select('p.id',
       DB::raw('concat(p.apellido, "  ", p.nombre) as apellido')) 
       ->distinct() 
       ->join('profesionales as p', 't.profesional','=','p.id')
       ->Where('t.dia','>=', NOW())
       ->Where('p.estado','=', "Activo")
       ->whereNotNull('p.apellido')
       ->orderBy('apellido','asc')
       ->get();   
      
       return view('iturno.index', compact('profesionales'));
          
    }

      
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             
      
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
