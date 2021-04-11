<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Obrasocial;
use App\Http\Requests\ValidarPacienteRequest;
use DB;
session_start();


class PacienteController extends Controller
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
    
    // public function index()
    // {
    //     //
    //     $pacientes = Paciente::all();
    //     return view('paciente.index') -> with('pacientes',$pacientes);
    // }

    public function index(Request $request)
    {
        if ($request->get('idpaciente')!=0) 
        {   
            $idpa = $request->get('idpaciente'); 
  
            $pacientes = DB::table('pacientes as pa')
            ->select('pa.id','pa.apellido','pa.nombre','dni','telefono1','telefono2','celular','email')
            ->where('id','=',$idpa)
            ->get();  
            
        }
        elseif ($request->get('paciente')!=0) 
        {   
            
            $pa = $request->get('paciente'); 
            $_SESSION['ipaciente'] = $pa;
            $idpa = $request->get('paciente'); 
  

            $pacientes = DB::table('pacientes as pa')
            ->select('pa.id','pa.apellido','pa.nombre','dni','telefono1','telefono2','celular','email')
            ->where('apellido','like','%' . $pa . '%')
            ->orwhere('nombre','like','%' . $pa . '%')
            ->orwhere('id','like','%' . $idpa . '%')
            ->orwhere('dni','like','%' . $pa . '%')
            ->orderBy('pa.apellido','asc')
            ->orderBy('pa.nombre','asc')
            ->get();  
            
        }
        elseif ($_SESSION['ipaciente'] !=null) 
        {    
            $pacientes = DB::table('pacientes as pa')
            ->select('pa.id','pa.apellido','pa.nombre','dni','telefono1','telefono2','celular','email')
            ->where('apellido','like','%' . $_SESSION['ipaciente'] . '%')
            ->orwhere('nombre','like','%' . $_SESSION['ipaciente'] . '%')
            ->orwhere('dni','like','%' . $_SESSION['ipaciente'] . '%')
            ->orderBy('pa.apellido','asc')
            ->orderBy('pa.nombre','asc')
            ->get();    
        }
        else
        { 
            $pacientes = DB::table('pacientes as pa')
            ->select('pa.id','pa.apellido','pa.nombre','dni','telefono1','telefono2','celular','email')
            ->where('id',0)
            ->get();  
        }
            
         
    return view('paciente.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $obrasociales = Obrasocial::where('estado','=','Activo')->get();
        return view('paciente.create', compact('obrasociales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarPacienteRequest $request)
    {
        //

        $pacientes=new paciente();

        $pacientes->apellido=$request->get('apellido');
        $pacientes->nombre=$request->get('nombre');
        $pacientes->telefono1=$request->get('telefono1');
        $pacientes->telefono2=$request->get('telefono2');
        $pacientes->fnacimiento=$request->get('fnacimiento');
        $pacientes->email=$request->get('email');

        if ($request->get('osocial')==null)
        {             
            $pa = 55; //"sin obra social"
            $pacientes->osocial=$pa;
        } 
        else
        { $pacientes->osocial=$request->get('osocial');
        }       
        
        $pacientes->plan=$request->get('plan');
        $pacientes->nrosocial=$request->get('nrosocial');
        $pacientes->domicilio=$request->get('domicilio');
        $pacientes->observa=$request->get('observa');
        $pacientes->obsclinica=$request->get('obsclinica');
        $pacientes->dni=$request->get('dni');
        $pacientes->celular=$request->get('celular');
       
        $pacientes->save();
        return redirect('/paciente')->with('message','Guardado Satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $pacientes = Paciente::find($id); 
         $obrasociales = Obrasocial::all();  
         
         return view('paciente.show',compact('pacientes','obrasociales'));
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
        $pacientes = Paciente::find($id);       
        $obrasociales = Obrasocial::all();
        
        return view('paciente.edit',compact('pacientes','obrasociales'));
      
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarPacienteRequest $request, $id)
    {
        //

        $pacientes = Paciente::find($id);
       
        $pacientes->apellido=$request->get('apellido');
        $pacientes->nombre=$request->get('nombre');
        $pacientes->telefono1=$request->get('telefono1');
        $pacientes->telefono2=$request->get('telefono2');
        $pacientes->fnacimiento=$request->get('fnacimiento');
        $pacientes->email=$request->get('email');

        if ($request->get('osocial')==null)
        {             
            $pa = 55; //"sin obra social"
            $pacientes->osocial=$pa;
        } 
        else
        { $pacientes->osocial=$request->get('osocial');
        }       


        
        $pacientes->plan=$request->get('plan');
        $pacientes->nrosocial=$request->get('nrosocial');
        $pacientes->domicilio=$request->get('domicilio');
        $pacientes->observa=$request->get('observa');
        $pacientes->obsclinica=$request->get('obsclinica');
        $pacientes->dni=$request->get('dni');
        $pacientes->celular=$request->get('celular');
       
        $pacientes->save();

        return redirect('/paciente')->with('message','Actualizado Satisfactoriamente !');
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
  
        $pacientes = Paciente::find($id);        
        $pacientes->delete();
        
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            //$e->getBindings();
            //return redirect('/paciente')->with('message','Tiene dependencias !');
            $message = "El registro que intenta eliminar tiene dependencias";
            return response()->json($message, 500);
        }

        return redirect('/paciente')->with('message','Eliminado Satisfactoriamente !');
    }
  
        
}
