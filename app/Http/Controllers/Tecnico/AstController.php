<?php

namespace App\Http\Controllers\Tecnico;

use App\Http\Controllers\Controller;
use App\Models\Tramite;
use Illuminate\Http\Request;

class AstController extends Controller
{
    public function show(Tramite $tramite){
        return view('tecnico.ast',compact('tramite'));
    }
}
