<?php

use App\Http\Controllers\Admin\EstadisticoController;
use App\Http\Controllers\Admin\TramiteController;
use App\Http\Livewire\Admin\ShowResponsable;
use App\Http\Livewire\Admin\ShowTecnico;
use App\Http\Livewire\Admin\ShowTramite;
use App\Http\Livewire\Admin\ShowUsuario;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:ejecutivo|operativo']], function () {
    Route::get('/usuarios', ShowUsuario::class)->name('usuarios.index');
    Route::get('/tecnico', ShowTecnico::class)->name('tecnicos.index');
    Route::get('/responsables', ShowResponsable::class)->name('responsable.index');
    Route::get('/listatramites', ShowTramite::class)->name('admin.listatramites.index');
    Route::get('/tramites', [TramiteController::class, 'index'])->name('admin.tramites.index');
    //Tramites   
});

Route::group(['middleware' => ['role:ejecutivo|operativo|tecnico']], function () {
    Route::get('/tramites/{tramite}', [TramiteController::class, 'show'])->name('admin.tramites.show');
    Route::get('/tramite/{mensaje}', [TramiteController::class, 'status'])->name('admin.tramites.status');
    Route::get('/estadisticas', [EstadisticoController::class, 'index'])->name('admin.estadistica.index');
});
