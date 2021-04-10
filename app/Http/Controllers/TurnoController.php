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

class TurnoController extends Controller
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

        // if ($request->input("accion") == "Buscar") {
       
        //     $profe = $request->get('profesional');
     
        //     $_SESSION['profe'] = $profe;

        // }

      
    //   $turnos = DB::table('vturnosfuturos') 
    //    ->where('profesional', $_SESSION['profe'])
    //    ->get();

    //    $tdiahora = DB::table('tdiahoras') 
    //    ->select(DB::raw('case dia
    //                     when 7 then "Domingo"
    //                     When 1 then "Lunes"
    //                     When 2 then "Martes"
    //                     When 3 then "Miércoles"
    //                     When 4 then "Jueves"
    //                     When 5 then "Viernes"
    //                     When 6 then "Sábado"
    //                     end as dias'),'horainicio','horafin','dia')
    //    ->orderBy('dia','asc')
    //    ->where('profesional','=',$_SESSION['profe'])
    //    ->get();

    if ($request->input("accion") != null) {
        $this->create($request);
         }

    $turnos = DB::table('vturnosfuturos') 
    ->where('profesional', $request->get('profesional'))
    ->get();

    $tdiahora = DB::table('tdiahoras') 
    ->select(DB::raw('case dia
                     when 7 then "Domingo"
                     When 1 then "Lunes"
                     When 2 then "Martes"
                     When 3 then "Miércoles"
                     When 4 then "Jueves"
                     When 5 then "Viernes"
                     When 6 then "Sábado"
                     end as dias'),'horainicio','horafin','dia')
    ->orderBy('dia','asc')
    ->where('profesional','=',$request->get('profesional'))
    ->get();
      
      return view('turno.index', compact('turnos','tdiahora'));
        

     }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        
        //
       // dd('entre');
       // $profesionales = Profesionales::all();
        $profesionales = DB::table('profesionales') 
        ->where('id', $request->get('accion'))
        ->get();
 
        
        //$paciente=Paciente::all();
        // $paciente = DB::table('pacientes')
        // ->select('id',DB::raw('concat(apellido," ",nombre,"-",dni) as apellido'))
        // ->orderBy('apellido', 'asc')
        // ->get();

        $paciente = DB::table('pacientes')
        ->select('id','apellido', 'nombre')
        ->orderBy('apellido', 'asc')
        ->get();

    
        //$tratamiento = Tratamiento::where('estado','=','Activo')->get();

        $tratamiento = DB::table('tratamientos')
                    ->orderBy('descripcion', 'asc')
                    ->where('estado','=','Activo')
                    ->get();

        //$proftrat = Profesionales_tratamiento::all();
                       
        // foreach ($profesionales as $profesional) {
        //   foreach ($proftrat as $proftrat) {
        //     foreach ($tratamiento as $tratamiento) {
        
               
        //     if ($profesional->id==$proftrat->profesionales_id) {
           
        //     if ($tratamiento->id==$proftrat->tratamiento_id) {
        //         echo $tratamiento->descripcion;
           
        //     }
        //     }  
        //     }  
        //     }
       // }
      
        return view('turno.create', compact('profesionales', 'tratamiento','paciente'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarTurnoRequest $request)
    {

       $tipo = $request->get('tipo');
       $profe = $request->get('profesional');
       $dia = $request->get('dia');
    
       $vc =$this->validacalenda($profe,$dia); //valida que exista calendario para la fecha

    if ( $vc != 0 )  // el dia no tiene calendario
    {
       $vf =$this->validaferiado($dia);

     if ( $vf == 0 )  // el día no es feriado
     {
       $vd =$this->validadia($profe,$dia);
       
     if ( $vd == 0 )  // el día está activo
     {
      
        $ct =$this->cantturno($tipo,$profe,$dia);
        $vt =$this->vturno($tipo,$profe);
        
      if ( $ct < $vt || $tipo =='Turno')  // tiene turnos disponibles
      {
       
      
        $turno=new Turno();
       
        $turno->tipo=$request->get('tipo');
        $turno->profesional=$request->get('profesional');
        $turno->paciente=$request->get('paciente');
        $turno->tratamiento=$request->get('tratamiento');
        $turno->hora=$request->get('hora');
        
        $vmes = $request->get('dia');
        $turno->mes=explode("-", $vmes)[1];   

        $vanio = $request->get('dia');
        $turno->anio=explode("-", $vanio)[0];  

        $turno->dia=$request->get('dia');

        $turno->estado=$request->input("estado", 'Ocupado');
                    
        $turno->save();

       

        return redirect('/turno')->with('status', '1'); //  Guardado satisfactoriamente !
        
        }
        else 
        { return redirect('/turno')->with('status', '2'); //Se excede el tipo de turno elegido !
        }   
    } 
    else 
    { return redirect('/turno')->with('status', '3');//El día está inactivo ! 
    }
    }
    else 
    { return redirect('/turno')->with('status', '4');//El día es feriado ! 
    } 
  } 
  else 
  {    return redirect('/turno')->with('status', '6');//El calendario no está generado para esa fecha ! 
  }
}
    
    
      private function vturno($tipo,$profe)
    {       
       // $cant=DB::select("select sobreturno from profesionales where id=?",array($profe));

        if ($tipo == 'STurno') { $campo='sobreturno'; }
        if ($tipo == 'STurnoE') { $campo='sobreturnoe'; }
        if ($tipo == 'Practicas') { $campo='practicas'; }
        
        if ($tipo != 'Turno')
        {

        $cant = DB::table('profesionales')
        ->where('id', $profe)
        ->select($campo)
        ->first();
           return $cant->$campo ?? 0;
        }
        else
        {
           return 0;
        }
    }                          

    private function cantturno($tipo,$profe,$dia)
    {

        $cant = DB::table('turnos')
        ->where('profesional', $profe)
        ->where('dia', $dia)
        ->where('Tipo', $tipo)
        ->whereNotNull('paciente')
        ->count();
      
        return $cant;
       
    }

  
    private function validadia($profe,$dia)
    {

        $cant = DB::table('diainactivos')
        ->where('profesional', $profe)
        ->where('diadesde', $dia)
        ->count();
        
        return $cant;
       
    }

    private function validacalenda($profe,$dia)
    {

        $cant = DB::table('turnos')
        ->where('profesional', $profe)
        ->where('dia', $dia)
        ->count();
        
        return $cant;
       
    }

    private function validaferiado($dia)
    {
        $cant = DB::table('feriados')
        ->where('dia', $dia)
        ->count();
        
        return $cant;
       
    }

   
                                /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //es para el boton alta create
    {
          
        //
      
       // $profesionales = Profesionales::all();
       $profesionales = DB::table('profesionales') 
       ->where('id', $id)
       ->get();

       
       //$paciente=Paciente::all();
       // $paciente = DB::table('pacientes')
       // ->select('id',DB::raw('concat(apellido," ",nombre,"-",dni) as apellido'))
       // ->orderBy('apellido', 'asc')
       // ->get();

       $paciente = DB::table('pacientes')
       ->select('id','apellido', 'nombre')
       ->orderBy('apellido', 'asc')
       ->get();

   
       //$tratamiento = Tratamiento::where('estado','=','Activo')->get();

       $tratamiento = DB::table('tratamientos')
                   ->orderBy('descripcion', 'asc')
                   ->where('estado','=','Activo')
                   ->get();

       //$proftrat = Profesionales_tratamiento::all();
                      
       // foreach ($profesionales as $profesional) {
       //   foreach ($proftrat as $proftrat) {
       //     foreach ($tratamiento as $tratamiento) {
       
              
       //     if ($profesional->id==$proftrat->profesionales_id) {
          
       //     if ($tratamiento->id==$proftrat->tratamiento_id) {
       //         echo $tratamiento->descripcion;
          
       //     }
       //     }  
       //     }  
       //     }
      // }
     
       return view('turno.create', compact('profesionales', 'tratamiento','paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $turno = Turno::find($id);

        $paciente = DB::table('pacientes')
        ->select('id','apellido', 'nombre')
        ->orderBy('apellido', 'asc')
        ->get();

                     
        $tratamiento = DB::table('tratamientos')
        ->orderBy('descripcion', 'asc')
        ->where('estado','=','Activo')
        ->get();        

        return view('turno.edit', compact('turno', 'paciente','tratamiento'));
        
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

   
        
 if ($request->input("accion") == "B") 
 {
 
        $turno = Turno::find($id);

        if ($turno->tipo == 'Turno')
        {

        $turno->paciente=$request->get('paciente');
        $turno->tratamiento=$request->get('tratamiento');
           
        $turno->save();
        return redirect('/turno');
        }
         else
        { 
            $turnos = Turno::find($id);        
            $turnos->delete();
            return redirect('/turno')->with('message','Eliminado Satisfactoriamente !');
        }        
 }
 else
 {
    $this->validate($request, [
        'tratamiento' => 'required|integer|not_in:0',
        'paciente'    => 'required|integer|not_in:0', ]);
    
     
    $turno = Turno::find($id);
    $dia = $turno->dia;
    $profe = $turno->profesional;

    $vf =$this->validaferiado($dia);

    if ( $vf == 0 )  // el día no es feriado
    {
        $vd =$this->validadia($profe,$dia);
       
        if ( $vd == 0 ) // el día está activo
        {   
                $trata = $request->get('tratamiento');
                
                $dur =$this->buscaduracion($trata); //busca duracion del tratamiento
                
                $vcant=$dur/15; //divide la duracion por 15 minutos de turno.

            if ( $vcant > 0 ) //quiere decir que el tratamiento tiene duracion cargada.
            {     
                $lib =$this->buscalibre($id,$dia); //busco espacios libres para ingresar mas de un turno
               
                If ($vcant <= $lib )  //si tengo espacios libres asigno los turnos
                {  

                        for ($i=1; $i<=$vcant; ++$i) 
                        {
                        $turno = Turno::find($id);
                        $turno->paciente=$request->get('paciente');
                        $turno->tratamiento=$request->get('tratamiento');
                            
                        $turno->save();
                        
                        $id=$id+1;  
                        }

                 return redirect('/turno');
                
                } 
                else 
                { return redirect('/turno')->with('status', '5'); 
                } //No tengo espacio libre!
       
            } 
            else 
            { 
                
                $turno = Turno::find($id);
                $turno->paciente=$request->get('paciente');
                $turno->tratamiento=$request->get('tratamiento');
                    
                $turno->save();

                return redirect('/turno');

            } 
        }
        else 
        {  return redirect('/turno')->with('status', '3'); 
        } //El día está inactivo ! 
           
    } 
    else 
    {return redirect('/turno')->with('status', '4');
    } //El día es feriado ! 

  }
}

   
    private function buscaduracion($trata)
    {
        $campo='duracion';
        $tiempo = DB::table('tratamientos')
        ->where('id', $trata)
        ->select($campo)
        ->first();
           
        return $tiempo->$campo ?? 0;
       
    }

    private function buscalibre($id,$dia)
    {
      
        $vcont=0;
        $turnos = DB::table('vturnosfuturos')
        ->select('paciente')
        ->orderBy('id', 'asc')
        ->Where('dia','=',$dia)
        ->Where('id','>=',$id)
        ->get();
      
        foreach ($turnos as $t) {
            if($t->paciente == null){    
              $vcont=$vcont+1;
              }
              else
              {    
              break;
              }
        }

        return $vcont;
           
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
