<?php

namespace App\Http\Controllers\Responsable;

use App\Http\Controllers\Controller;
use App\Models\Responsable;
use App\Models\Tramite;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function index(){
       $tramite = Tramite::find(auth()->user()->responsable->tramite_id);
       return view('responsable.tramite.index',compact('tramite'));
   }

}
