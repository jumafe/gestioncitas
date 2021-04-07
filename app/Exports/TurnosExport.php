<?php

namespace App\Exports;

use App\Turno;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TurnosExport implements FromCollection,WithHeadings
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
            'Paciente',
            'Obra Social',
            'Plan',
            'Afiliado Nro.',
            'Tratamiento'
        ];
    }
    public function collection()
    {

        $turnos = DB::table('vturnos as v') //la vista tiene los turnos del dia
        ->select('v.apellido','v.dia','v.hora','v.paciente','o.descripcion as desc_osocial',
        'pa.plan','pa.nrosocial','t.descripcion as tratamiento')
        ->join('pacientes as pa', 'v.idpaciente','=','pa.id')
        ->leftjoin('obrasocials as o', 'pa.osocial','=','o.id')
        ->join('tratamientos as t', 't.id','=','v.idtratamiento')
        ->where('profesional', $_SESSION['excelprofe'])
        ->whereNotnull('paciente')
        ->get();
         return $turnos;

    }
}