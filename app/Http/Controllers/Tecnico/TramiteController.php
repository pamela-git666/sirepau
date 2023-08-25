<?php

namespace App\Http\Controllers\Tecnico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tecnico;
use App\Models\Tramite;

class TramiteController extends Controller
{
    public function index(){
         
         $tramites = Tramite::query()->where('tecnico_id', auth()->user()->tecnico->id)
         ->orderByDesc('id');
    
         if (request('fase')) {
          $tramites->where('fase', request('fase'));
        }

        $tramites = $tramites->get();

        $pre = Tramite::where('fase', 1)->where('tecnico_id', auth()->user()->tecnico->id)->count();
        $ini = Tramite::where('fase', 2)->where('tecnico_id', auth()->user()->tecnico->id)->count();
        $ana = Tramite::where('fase', 3)->where('tecnico_id', auth()->user()->tecnico->id)->count();
        $emi = Tramite::where('fase', 4)->where('tecnico_id', auth()->user()->tecnico->id)->count();

        return view('tecnico.tramites.index', compact('tramites', 'pre', 'ini', 'ana', 'emi'));
    }

    public function show(Tramite $tramite){
        return view('tecnico.tramites.show', compact('tramite'));
    }
    
}
