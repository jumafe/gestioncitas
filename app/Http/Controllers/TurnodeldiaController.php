<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turnodeldia;
use Carbon\Carbon;


use DB;

class TurnodeldiaController extends Controller
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
  
    public function index()
    {
       
        $turnos = DB::table('vturnos')
        ->select('id','dia','apellido','paciente','tratamiento','hora','llegada')
        ->wherenotnull('paciente')
        ->orderBy('profesional', 'asc')
        ->orderBy('dia', 'asc')
        ->orderBy('hora', 'asc')
        ->get();

    //    $turnos = DB::select('SELECT t.id, t.dia, p.apellido,  concat(pa.apellido, "  ", pa.nombre) paciente, tr.descripcion tratamiento, t.hora,
    //    DATE_FORMAT(t.llegada, "%H:%i") llegada
    //    FROM turnos t
    //    INNER JOIN profesionales p on  t.profesional=p.id
    //    INNER JOIN pacientes pa on t.paciente=pa.id 
    //    INNER JOIN tratamientos tr on t.tratamiento=tr.id
    //    Where Date_format(dia,"%Y/%m/%d") =  Date_format(CURDATE(),"%Y/%m/%d") 
    //    and t.paciente is not null
    //    order by t.profesional, t.anio, t.dia, t.hora asc');

        return view('turnosdeldia.index', compact('turnos'));
    
     }


     public function update(Request $request, $id)
     {
        date_default_timezone_set("America/Argentina/Buenos_Aires");

       $resul =  DB::table('turnos')->where('id', $id)->update(['llegada' => Carbon::now()]);
       
      
       return redirect('/turnosdeldia')->with('status', '1');
    }         
  
 

}
