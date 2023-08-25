<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leylimitacion extends Model
{
    use SoftDeletes;
    use HasFactory;
     //Asignación masiva
     protected $fillable = [
        'numruta',
        'fecha',
        'observacion',
        'archivo',
        'tramite_id',
    ];
     //Relación uno a muchos tramite-ley de limitacion INVERSA
     public function tramite()
     {
         return $this->belongsTo(Tramite::class);
     }
}
