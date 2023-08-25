<?php

use App\Http\Controllers\Responsable\TramiteController;
use Illuminate\Support\Facades\Route;

Route::get('/tramite', [TramiteController::class, 'index'])->name('responsable.tramite.index');