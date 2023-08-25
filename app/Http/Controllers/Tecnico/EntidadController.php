<?php

namespace App\Http\Controllers\Tecnico;

use App\Http\Controllers\Controller;
use App\Models\Ritu;
use Illuminate\Http\Request;

class EntidadController extends Controller
{
    public function show(Ritu $ritu){
        return view('entidad.entidades',compact('ritu'));
    }
}
