<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function PDFTramite($id)
    {
        $tramite = Tramite::find($id);
        $ritus = $tramite->ritus;

        $fecha_impresion = Carbon::now();        

        $date = $tramite->created_at;
        $fecha = $date->format('d/m/Y');

        $pdf = PDF::loadview('admin.reportes.tramite',compact('tramite','ritus','fecha','fecha_impresion'));
        return $pdf->stream('Tramite.pdf');

    }
}
