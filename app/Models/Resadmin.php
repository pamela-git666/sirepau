<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resadmin extends Model
{
    use SoftDeletes;
    use Loggable;
    use HasFactory;

    //Asignación masiva
    protected $fillable = [
        'numruta',
        'numresolucion',
        'fecha',
        'tipo',
        'archivo',
        'tramite_id',
    ];

     //Relación uno a muchos tramite-resadmin INVERSA
     public function tramite()
     {
         return $this->belongsTo(Tramite::class);
     }
}
