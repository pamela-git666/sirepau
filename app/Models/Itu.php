<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itu extends Model
{
    use SoftDeletes;
    use HasFactory;

    //Asignación masiva
    protected $fillable = [
        'numinforme',
        'numruta',
        'nombre',
        'fecha',
        'archivo',
        'tipo',
        'tramite_id',
    ];

     //Relación uno a muchos tramite-itu INVERSA
     public function tramite()
     {
         return $this->belongsTo(Tramite::class);
     }
}
