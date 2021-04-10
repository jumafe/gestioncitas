<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesionales;
use App\Models\Paciente;
use App\Models\Especialidades;
use App\Models\Historiaclinica;
use DB;
use App\Http\Requests\ValidarHistoriaclinicaRequest;

session_start();

class HistoriaclinicaController extends Controller
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
    public function index(Request $request)
    {
        
        if  ($request->input("paciente")==null){
           
            $historiaclinicas = DB::table('vhistoriaclinica')
            //->where('idpaciente',$pa)
            ->where('idpaciente',$_SESSION['paciente'])
            ->Orderby('dia','desc')
            ->get();

        }  else{

            $pa = $request->input("paciente");
            $_SESSION['paciente'] = $pa;

            $historiaclinicas = DB::table('vhistoriaclinica')
            ->where('idpaciente',$pa)
            ->Orderby('dia','desc')
            //->where('idpaciente',$_SESSION['paciente'])
            ->get();
        }
          
            return view('historiaclinica.index', compact('historiaclinicas'));
              
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

        
         $especialidades = DB::table('especialidades as e')
         ->select('e.id','e.descripcion')
         ->distinct() 
         ->join('profesionales as p', 'p.especialidad','=','e.id')
         ->Where('e.estado','=',"Activo")
         ->get();

        $pacientes = DB::table('pacientes')
        ->select('id','apellido','nombre')
        ->orderBy('apellido','asc')
        ->orderBy('nombre','asc')
        ->get();

        return view('historiaclinica.create', compact('profesionales', 'especialidades','pacientes'));

    }

    public function show($id)
    {        
        $profesionales = DB::table('profesionales')
        ->select('id',
        DB::raw('concat(apellido, " ", nombre) as apellido'))
        ->Where('estado','=',"Activo")
        ->orderBy('apellido','asc')
        ->get();

        
         $especialidades = DB::table('especialidades as e')
         ->select('e.id','e.descripcion')
         ->distinct() 
         ->join('profesionales as p', 'p.especialidad','=','e.id')
         ->Where('e.estado','=',"Activo")
         ->get();

        $pacientes = DB::table('pacientes')
        ->select('id','apellido','nombre')
        ->Where('id','=',$id)
        ->orderBy('apellido','asc')
        ->orderBy('nombre','asc')
        ->get();

        return view('historiaclinica.create', compact('profesionales', 'especialidades','pacientes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarHistoriaclinicaRequest $request)
    {
        $historiaclinica=new Historiaclinica();
       
        $historiaclinica->dia=$request->get('dia');
        $historiaclinica->profesional=$request->get('profesional');
        $historiaclinica->paciente=$request->get('paciente');
        $historiaclinica->especialidad=$request->get('especialidad');
        $historiaclinica->diagnostico=$request->get('diagnostico');
        $historiaclinica->observacion=$request->get('observacion');
                           
        $historiaclinica->save();

        return redirect('/historiaclinica')->with('message','Guardado Satisfactoriamente !');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $historiaclinicas = Historiaclinica::find($id);
    //     $profesionales = Profesionales::all();
    //     $especialidades = Especialidades::all();
    //     $pacientes = Paciente::all();
    //     return view('historiaclinica.show', compact('historiaclinicas','profesionales', 'especialidades','pacientes'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $historiaclinicas = Historiaclinica::find($id);
        
    //     $profesionales = DB::table('profesionales')
    //     ->select('id',
    //     DB::raw('concat(apellido, " ", nombre) as apellido'))
    //     ->Where('estado','=',"Activo")
    //     ->orderBy('apellido','asc')
    //     ->get();
        
    //     $especialidades = Especialidades::where('estado','=','Activo')->get();
    //     $pacientes = Paciente::all();
    //     return view('historiaclinica.edit', compact('historiaclinicas','profesionales', 'especialidades','pacientes'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(ValidarHistoriaclinicaRequest $request, $id)
    // {

    //     $historiaclinica = Historiaclinica::find($id);
             
    //     $historiaclinica->dia=$request->get('dia');
    //     $historiaclinica->profesional=$request->get('profesional');
    //     $historiaclinica->paciente=$request->get('paciente');
    //     $historiaclinica->especialidad=$request->get('especialidad');
    //     $historiaclinica->diagnostico=$request->get('diagnostico');
    //     $historiaclinica->observacion=$request->get('observacion');
                           
    //     $historiaclinica->save();

    //     return redirect('/historiaclinica')->with('message','Actualizado Satisfactoriamente !');
      
                  

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $historiaclinicas = Historiaclinica::find($id);        
    //     $historiaclinicas->delete();

    //     return redirect('/historiaclinica')->with('message','Eliminado Satisfactoriamente !');
    // }
}
