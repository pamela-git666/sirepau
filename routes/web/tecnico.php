<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\Tecnico\AstController;
use App\Http\Controllers\Tecnico\EntidadController;
use App\Http\Controllers\Tecnico\RituController;
use App\Http\Controllers\Tecnico\TramiteController;
use App\Http\Livewire\Tecnico\InformacionBase;
use App\Http\Livewire\Tecnico\InicioTramite;
use App\Http\Livewire\Tecnico\ShowAcl;
use App\Http\Livewire\Tecnico\ShowAst;
use App\Http\Livewire\Tecnico\ShowHomologacion;
use App\Http\Livewire\Tecnico\ShowItu;
use App\Http\Livewire\Tecnico\ShowLeyLimitacion;
use App\Http\Livewire\Tecnico\ShowNotificacion;
use App\Http\Livewire\Tecnico\ShowResAdmin;
use App\Http\Livewire\Tecnico\ShowResponsable;
use App\Http\Livewire\Tecnico\ShowRitu;
use App\Http\Livewire\Tecnico\ShowTramite;
use App\Http\Livewire\Tecnico\SuficienciaTecnica;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function(){
    //Ruta de Prestamos de un usuario
    Route::get('/tramite', [TramiteController::class, 'index'])->name('tecnico.tramites.index');
    //Ruta de solicitar resumen de trámite
    Route::get('/tramite/{tramite}', [TramiteController::class, 'show'])->name('tecnico.tramites.show');
    //Ruta Tramites Información Base 
    Route::get('/infbase/{tramite}',InformacionBase::class)->name('infbase.index');
    //Ruta Tramites de Inicio
    Route::get('/inicio_tramite/{tramite}',InicioTramite::class)->name('inicio.index');
    //Ruta Tramites de Ritus
    Route::get('/ritu/{tramite}',ShowRitu::class)->name('ritu.index');
   //Ruta Tramites Análisis de Concordancia Legal 
   Route::get('/ast/{tramite}',ShowAst::class)->name('ast.index');
   //Ruta Tramites Análisis de Suficiencia Técnica 
   Route::get('/acl/{tramite}',ShowAcl::class)->name('acl.index');
    //Ruta Tramites Informe tecnico urbano 
    Route::get('/itu/{tramite}',ShowItu::class)->name('itu.index');
   //Ruta Tramites Homologación 
   Route::get('/homologacion/{tramite}',ShowHomologacion::class)->name('homologacion.index'); 
   //Ruta Entidades
   Route::get('/entidades/{ritu}',[EntidadController::class,'show'])->name('entidad.index');
   //Lista de Tramites
   Route::get('/listatramites',ShowTramite::class)->name('tecnico.listatramites.index'); 

   //Resolución Administrativa
   Route::get('/resolucion-administrativa/{tramite}', ShowResAdmin::class)->name('resadmin.index');
   //Ley de Limitación
   Route::get('/ley-limitacion/{tramite}', ShowLeyLimitacion::class)->name('leylimitacion.index');

   //reportes
   Route::get('/pdftramite/{id}', [PDFController::class, 'PDFTramite'])->name('descargarPDFTramite');

   //Ruta notificación
   Route::get('/notificacion/{user}',ShowNotificacion::class)->name('notificacion.index'); 

});