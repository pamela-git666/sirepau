<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acl;
use App\Models\Ast;
use App\Models\Homologacion;
use App\Models\Resadmin;
use App\Models\Tramite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EstadisticoController extends Controller
{
    public function index()
    {
            $pre = Tramite::where('fase', 1)->count();
            $ini = Tramite::where('fase', 2)->count();
            $ana = Tramite::where('fase', 3)->count();
            $emi = Tramite::where('fase', 4)->count();
            $resadmin = Resadmin::where('tipo','admisión')->count();
            $ist = Ast::count();
            $acl = Acl::count();
            $homologacion = Homologacion::count();
            //años
            $hoy = Carbon::now();  //año actual
           
            $cant_hoy = Homologacion::whereYear('fecha',$hoy)->count();
            $cant_hoy1 = Homologacion::whereYear('fecha', Carbon::now()->subYear())->count();
            $cant_hoy2 = Homologacion::whereYear('fecha', Carbon::now()->subYear(2))->count();
            $cant_hoy3 = Homologacion::whereYear('fecha', Carbon::now()->subYear(3))->count();
            //estadistico por departamentos
            //La Paz
            $lapaz1 = Tramite::where('fase', 1)->
                               where('departamento_id', 1)->count();
            $lapaz2 = Tramite::where('fase', 2)->
                               where('departamento_id', 1)->count();
            $lapaz3 = Tramite::where('fase', 3)->
                               where('departamento_id', 1)->count();
            $lapaz4 = Tramite::where('fase', 4)->
                               where('departamento_id', 1)->count();

            $scz1 = Tramite::where('fase', 1)->
                               where('departamento_id', 3)->count();
            $scz2 = Tramite::where('fase', 2)->
                               where('departamento_id', 3)->count();
            $scz3 = Tramite::where('fase', 3)->
                               where('departamento_id', 3)->count();
            $scz4 = Tramite::where('fase', 4)->
                               where('departamento_id', 3)->count();
            
            $cbba1 = Tramite::where('fase', 1)->
                               where('departamento_id', 2)->count();
            $cbba2 = Tramite::where('fase', 2)->
                               where('departamento_id',2)->count();
            $cbba3 = Tramite::where('fase', 3)->
                               where('departamento_id', 2)->count();
            $cbba4 = Tramite::where('fase', 4)->
                               where('departamento_id', 2)->count();

            $beni1 = Tramite::where('fase', 1)->
                               where('departamento_id', 4)->count();
            $beni2 = Tramite::where('fase', 2)->
                               where('departamento_id', 4)->count();
            $beni3 = Tramite::where('fase', 3)->
                               where('departamento_id', 4)->count();
            $beni4 = Tramite::where('fase', 4)->
                               where('departamento_id', 4)->count();

            $pan1 = Tramite::where('fase', 1)->
                               where('departamento_id', 5)->count();
            $pan2 = Tramite::where('fase', 2)->
                               where('departamento_id', 5)->count();
            $pan3 = Tramite::where('fase', 3)->
                               where('departamento_id', 5)->count();
            $pan4 = Tramite::where('fase', 4)->
                               where('departamento_id', 5)->count();

            $or1 = Tramite::where('fase', 1)->
                               where('departamento_id', 6)->count();
            $or2 = Tramite::where('fase', 2)->
                               where('departamento_id', 6)->count();
            $or3 = Tramite::where('fase', 3)->
                               where('departamento_id', 6)->count();
            $or4 = Tramite::where('fase', 4)->
                               where('departamento_id', 6)->count();

            $tar1 = Tramite::where('fase', 1)->
                               where('departamento_id', 7)->count();
            $tar2 = Tramite::where('fase', 2)->
                               where('departamento_id', 7)->count();
            $tar3 = Tramite::where('fase', 3)->
                               where('departamento_id', 7)->count();
            $tar4 = Tramite::where('fase', 4)->
                               where('departamento_id', 7)->count();

            $chuq1 = Tramite::where('fase', 1)->
                               where('departamento_id', 8)->count();
            $chuq2 = Tramite::where('fase', 2)->
                               where('departamento_id', 8)->count();
            $chuq3 = Tramite::where('fase', 3)->
                               where('departamento_id', 8)->count();
            $chuq4= Tramite::where('fase', 4)->
                               where('departamento_id', 8)->count();

            $pot1 = Tramite::where('fase', 1)->
                               where('departamento_id', 9)->count();
            $pot2 = Tramite::where('fase', 2)->
                               where('departamento_id', 9)->count();
            $pot3 = Tramite::where('fase', 3)->
                               where('departamento_id', 9)->count();
            $pot4 = Tramite::where('fase', 4)->
                               where('departamento_id', 9)->count();


    	return view('admin.estadistica.index',compact('pre','ini','ana','emi','hoy',
    'cant_hoy','cant_hoy1','cant_hoy2','cant_hoy3','resadmin','ist','acl','homologacion',
'lapaz1','lapaz2','lapaz3','lapaz4','scz1','scz2','scz3','scz4','cbba1','cbba2','cbba3','cbba4',
'beni1','beni2','beni3','beni4','pan1','pan2','pan3','pan4','or1','or2','or3','or4',
'tar1','tar2','tar3','tar4','chuq1','chuq2','chuq3','chuq4','pot1','pot2','pot3','pot4'));
    }
}
