<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Mensaje;
use App\Models\Tramite;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function index(){
        if (request('fase')) {
            $tramites = Tramite::where('fase', request('fase'))->get();
            $pre = Tramite::where('fase', 1)->count();
            $ini = Tramite::where('fase', 2)->count();
            $ana = Tramite::where('fase', 3)->count();
            $emi = Tramite::where('fase', 4)->count();
    
            $departamentos = Departamento::all();

            return view('admin.tramites.index', compact('tramites', 'pre', 'ini', 'ana', 'emi','departamentos'));
    
        } else {
            $pre = Tramite::where('fase', 1)->count();
            $ini = Tramite::where('fase', 2)->count();
            $ana = Tramite::where('fase', 3)->count();
            $emi = Tramite::where('fase', 4)->count();


            $tramites = 'NULL';

            $departamentos = Departamento::all();

            return view('admin.tramites.index', compact( 'tramites','pre', 'ini', 'ana', 'emi','departamentos'));
        }
            
    }

    public function show(Tramite $tramite){
        $hora = now()->dayOfWeek;
        
        return view('admin.tramites.show', compact('tramite','hora'));
    }

    public function status(Mensaje $mensaje){
        $tramite = Tramite::find($mensaje->tramite_id);
           if ($mensaje->status == 1) {
             $mensaje->status = 2;
             $mensaje->update();
             return view('admin.tramites.show', compact('tramite'));
           } else {
            return view('admin.tramites.show', compact('tramite'));
           }
           
    }
}
