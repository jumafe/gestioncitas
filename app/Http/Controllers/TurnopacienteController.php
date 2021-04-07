<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\Profesionales;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Carbon\Carbon;
use App\Http\Requests\ValidarTurnoRequest;

use App\Models\Profesionales_tratamiento;

use DB;

session_start();

class TurnopacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this ->middleware('auth');
     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if  ($request->input("paciente")==null){
           
            $turnos = DB::table('vturnospaciente') 
            ->where('idpaciente',$_SESSION['paciente'])
            ->get();

   
        }  else{

            $pa = $request->input("paciente");
            $_SESSION['paciente'] = $pa;

            $turnos = DB::table('vturnospaciente') 
            ->where('idpaciente',$pa)
            ->get();
        }
     
        return view('turnopaciente.index', compact('turnos'));
          
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
    public function store(ValidarTurnoRequest $request)
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
   
   if ($request->input("accion") == "Borrar") 
    {
    
           $turno = Turno::find($id);
           $turno->paciente=$request->get('paciente');
           $turno->tratamiento=$request->get('tratamiento');
              
           $turno->save();
           return redirect('/turnopaciente');
                   
    }

}

   
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
   
}
