<?php

use App\Http\Livewire\Admin\ShowDirector;
use App\Http\Livewire\Admin\ShowArchivo;
use App\Http\Livewire\Admin\Backup\Backups;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/archivos',ShowArchivo::class)->name('archivos.index');

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('/administradores',ShowDirector::class)->name('director.index');
    Route::get('/respaldos',Backups::class)->name('admin.backup');
    
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/linkstorage', function(){
    Artisan::call('storage:link');
});
