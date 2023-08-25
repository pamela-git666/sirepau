<?php

namespace App\Http\Controllers\Tecnico;

use App\Http\Controllers\Controller;
use App\Models\Tramite;
use Illuminate\Http\Request;

class RituController extends Controller
{
    public function show(Tramite $tramite){
        return view('tecnico.admision',compact('tramite'));
    }
}
