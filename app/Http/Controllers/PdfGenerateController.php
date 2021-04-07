<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;


class PdfGenerateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
       // $turnos = DB::table("turnos")->get();
       $turnos = DB::select('SELECT t.id, DATE_FORMAT(t.dia, "%d/%m/%Y") dia, p.apellido,  concat(pa.apellido, "  ", pa.nombre) paciente, tr.descripcion tratamiento, t.hora,
       DATE_FORMAT(t.llegada, "%H:%i") llegada
       FROM turnos t
       INNER JOIN profesionales p on  t.profesional=p.id
       INNER JOIN pacientes pa on t.paciente=pa.id 
       INNER JOIN tratamientos tr on t.tratamiento=tr.id
       Where 
       t.paciente is not null
       order by t.profesional, t.anio, t.dia, t.hora asc');


        view()->share('turnos',$turnos);

        if($request->has('download')) {
        	// pass view file
            $pdf = PDF::loadView('pdfview');
            // download pdf
            return $pdf->download('turnos.pdf');
        }
        return view('pdfview');
    }

   
}