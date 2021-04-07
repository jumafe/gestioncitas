<?php

namespace App\Exports;

use App\Historiaclinica;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistoriaclinicaExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Paciente',
            'F. Nacimiento',
            'Obra Social',
            'Afiliado Nro.',
            'Observacion Clínica Gral.',
            'Dia',
            'Profesional',
            'Especialidad',
            'Diagnóstico',
            'Observación'
        ];
    }

    public function collection()
    {
        $historiaclinicas = DB::table('historiaclinicas as h')
        ->select(DB::raw('concat(pa.apellido, "  ", pa.nombre) as paciente'),
        'pa.fnacimiento','o.descripcion as desc_osocial','pa.nrosocial','pa.obsclinica',
        'h.dia', 'p.apellido', 'e.descripcion as desc_especialidad', 'h.diagnostico', 'h.observacion')
        ->join('profesionales as p', 'h.profesional','=','p.id')
        ->join('pacientes as pa', 'h.paciente','=','pa.id')
        ->join('obrasocials as o', 'pa.osocial','=','o.id')
        ->join('especialidades as e', 'h.especialidad','=','e.id')
        ->Where('pa.id','=',$_SESSION['excelpaciente'])
        ->OrderBy('h.dia','asc')
        ->get();

        return $historiaclinicas;

                 
    }
}
