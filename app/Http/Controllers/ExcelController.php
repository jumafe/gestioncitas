<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TurnosExport;
use App\Exports\TurnosRangoExport;
use App\Exports\HistoriaclinicaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Paciente;
use DB;

session_start();

class ExcelController extends Controller
{

    
  public function export(Request $request)
  {
    
      if ($request->input("accion") == "HClinicas") 
      {
        $_SESSION['excelpaciente'] =  Request('paciente');  

           return $this->exportHC();
      } 
      
      elseif ($request->input("accion") == "Turnos")  
      
      {
        $_SESSION['excelprofe'] =  Request('profesional');         
       
        return $this->exportTU();
      }
      else 
      
      {
        $_SESSION['excelprofe2'] =  Request('profesional2');         
        $_SESSION['exceldesde'] =  Request('diadesde');         
        $_SESSION['excelhasta'] =  Request('diahasta');         
        $_SESSION['exceltrata'] =  Request('tratamiento');         
       
        return $this->exportTurnosRango();
      }
  }
      
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

       $pacientes = DB::table('historiaclinicas as h')
        ->select('pa.id', 
        DB::raw('concat(pa.apellido, " ", pa.nombre," ",dni) as apellido'))  
        ->distinct()
        ->join('pacientes as pa', 'h.paciente','=','pa.id') 
       // ->Where('pa.id','=',$_SESSION['excelpaciente'])
        ->OrderBy('apellido','asc')
        ->OrderBy('nombre','asc')
        ->get();

        $tratamiento = DB::table('turnos as t')
        ->select('tr.id', 'tr.descripcion')
        ->distinct() 
        ->join('tratamientos as tr', 'tr.id','=','t.tratamiento')
        ->Where('t.dia','>=', NOW())
        ->whereNotNull('t.paciente')
        ->orderBy('tr.descripcion','asc')
        ->get();   

        $tratamiento = DB::table('turnos as t')
        ->select('tr.id', 'tr.descripcion')
        ->distinct() 
        ->join('tratamientos as tr', 'tr.id','=','t.tratamiento')
        ->whereNotNull('t.paciente')
        ->orderBy('tr.descripcion','asc')
        ->get();   
      
       return view('Exports.index', compact('profesionales','pacientes','tratamiento'));
          
    }
   
    public function exportTU(){
       
        return Excel::download(new TurnosExport, 'TurnosDelDia.xlsx');
    }

    public function exportHC(){
        return Excel::download(new HistoriaclinicaExport, 'HistoriaClinica.xlsx');
    }

    public function exportTurnosRango(){
       
      return Excel::download(new TurnosRangoExport, 'Turnos.xlsx');
  }
}