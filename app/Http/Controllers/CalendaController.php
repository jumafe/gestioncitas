<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class CalendaController extends Controller
{

  public function __construct()
  {
      $this ->middleware('auth');
   
  }
    

  public function eliminaroprocesarcalenda(Request $request)
  {

    $this->validate($request, [
      'profesional'    => 'required|integer|not_in:0',
      'diadesde'    => 'required',
  ]);
  
      if ($request->input("accion") == "Eliminar") {

      

          return $this->eliminarcalenda($request);
      } else {
          return $this->postcalenda($request);
      }
  }


    public function postcalenda(Request $request)
    {  
     
       $profe = Request('profesional');
  
       $from = Carbon::createFromFormat('Y-m', $request->get('diadesde'))->startOfMonth();
         $to = Carbon::createFromFormat('Y-m', $request->get('diadesde'))->endOfMonth();
 
       $vmes = explode("-", $from)[1];   
       $vanio = explode("-", $from)[0];  

       $ec =$this->existecalenda($profe,$vmes,$vanio);

       if ( $ec ==0 )
       {  
          $profesional = Request('profesional');
       

          $sps = DB::select("call sp_gcalendario(?,?,?)",array($profesional,$from,$to));
          
          //$ms = 'Calendario generado correctamente para el profesional:  '. $profesional;
          //return view('Gcalendario.show'), compact('ms'));
        
          return redirect('/gcalendario')->with('status', '1');
        }
        else   
        {   return redirect('/gcalendario')->with('status', '2');
        }
    }


    private function existecalenda($profe,$vmes,$vanio)
    {

         $cant = DB::table('turnos')
        ->where('profesional', $profe)
        ->where('mes', $vmes)
        ->where('anio', $vanio)
        ->count();
      
        return $cant;
       
    }

    public function eliminarcalenda(Request $request)
    {  
     
       $profe = Request('profesional');
  
       $from = Carbon::createFromFormat('Y-m', $request->get('diadesde'))->startOfMonth();
         $to = Carbon::createFromFormat('Y-m', $request->get('diadesde'))->endOfMonth();
 
       $vmes = explode("-", $from)[1];   
       $vanio = explode("-", $from)[0];  

      $et =$this->existeturno($profe,$vmes,$vanio);

       if ( $et == 0 )
       {  
            DB::table('turnos')
            ->where('profesional', $profe)
            ->where('mes', $vmes)
            ->where('anio', $vanio)->delete();
                 
          return redirect('/gcalendario')->with('status', '3');
        }
        else   
        {   return redirect('/gcalendario')->with('status', '4');
        }
    }

    private function existeturno($profe,$vmes,$vanio)
    {

      $cant = DB::table('turnos')
      ->where('profesional', $profe)
      ->where('mes', $vmes)
      ->where('anio', $vanio)
      ->whereNotNull('paciente')
      ->count();
         
        return $cant;

      
       
    }
  
}
