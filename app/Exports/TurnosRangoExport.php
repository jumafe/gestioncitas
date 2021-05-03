<?php

namespace App\Exports;

use App\Turno;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TurnosRangoExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Profesional',
            'Fecha',
            'Hora',
            'Apellido',
            'Nombre',
            'Obra Social',
            'Plan',
            'Afiliado Nro.',
            'Tratamiento'
        ];
    }
    public function collection()
    {

         //la vista tiene los turnos del dia
        if ($_SESSION['exceltrata']==0 && $_SESSION['excelprofe2']==0)  {
        
        $turnos = DB::table('turnos as t') 
        ->select('pr.apellido as profesional','t.dia','t.hora','pa.apellido','pa.nombre','o.descripcion as desc_osocial',
        'pa.plan','pa.nrosocial','tr.descripcion as tratamiento')
        ->join('pacientes as pa', 't.paciente','=','pa.id')
        ->join('profesionales as pr', 't.profesional','=','pr.id')
        ->join('obrasocials as o', 'pa.osocial','=','o.id')
        ->join('tratamientos as tr', 'tr.id','=','t.tratamiento')
       // ->where('profesional', $_SESSION['excelprofe2'])
        ->where('dia','>=', $_SESSION['exceldesde'])
        ->where('dia','<=',$_SESSION['excelhasta'])
        ->whereNotnull('t.paciente')  
        //->when($_SESSION['exceltrata']= 0,'t.tratamiento',$_SESSION['exceltrata'])
        ->get();      
        return $turnos;
    }
    elseif ($_SESSION['exceltrata']!=0 && $_SESSION['excelprofe2']!=0) 
    {
        $turnos = DB::table('turnos as t') 
        ->select('pr.apellido as profesional','t.dia','t.hora','pa.apellido','pa.nombre','o.descripcion as desc_osocial',
        'pa.plan','pa.nrosocial','tr.descripcion as tratamiento')
        ->join('pacientes as pa', 't.paciente','=','pa.id')
        ->join('profesionales as pr', 't.profesional','=','pr.id')
        ->join('obrasocials as o', 'pa.osocial','=','o.id')
        ->join('tratamientos as tr', 'tr.id','=','t.tratamiento')
        ->where('profesional', $_SESSION['excelprofe2'])
        ->where('dia','>=', $_SESSION['exceldesde'])
        ->where('dia','<=',$_SESSION['excelhasta'])
        ->whereNotnull('t.paciente')  
        ->where('t.tratamiento','=',$_SESSION['exceltrata'])
        ->get();      
        return $turnos;
        
    }
    elseif ($_SESSION['exceltrata']==0 && $_SESSION['excelprofe2']!=0) 
    {
        $turnos = DB::table('turnos as t') 
        ->select('pr.apellido as profesional','t.dia','t.hora','pa.apellido','pa.nombre','o.descripcion as desc_osocial',
        'pa.plan','pa.nrosocial','tr.descripcion as tratamiento')
        ->join('pacientes as pa', 't.paciente','=','pa.id')
        ->join('profesionales as pr', 't.profesional','=','pr.id')
        ->join('obrasocials as o', 'pa.osocial','=','o.id')
        ->join('tratamientos as tr', 'tr.id','=','t.tratamiento')
        ->where('profesional', $_SESSION['excelprofe2'])
        ->where('dia','>=', $_SESSION['exceldesde'])
        ->where('dia','<=',$_SESSION['excelhasta'])
        ->whereNotnull('t.paciente')  
        //->where('t.tratamiento','=',$_SESSION['exceltrata'])
        ->get();      
        return $turnos;
        
    }
    elseif ($_SESSION['exceltrata']!=0 && $_SESSION['excelprofe2']==0) 
    {
        $turnos = DB::table('turnos as t') 
        ->select('pr.apellido as profesional','t.dia','t.hora','pa.apellido','pa.nombre','o.descripcion as desc_osocial',
        'pa.plan','pa.nrosocial','tr.descripcion as tratamiento')
        ->join('pacientes as pa', 't.paciente','=','pa.id')
        ->join('profesionales as pr', 't.profesional','=','pr.id')
        ->join('obrasocials as o', 'pa.osocial','=','o.id')
        ->join('tratamientos as tr', 'tr.id','=','t.tratamiento')
        //->where('profesional', $_SESSION['excelprofe2'])
        ->where('dia','>=', $_SESSION['exceldesde'])
        ->where('dia','<=',$_SESSION['excelhasta'])
        ->whereNotnull('t.paciente')  
        ->where('t.tratamiento','=',$_SESSION['exceltrata'])
        ->get();      
        return $turnos;
        
    }
}
}

