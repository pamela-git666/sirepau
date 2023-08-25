<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ast extends Model
{
    use SoftDeletes;
    use Loggable;
    use HasFactory;

     //Asignación masiva
     protected $fillable = [
        'numruta',
        'fecha',
        'observacion',
        'archivo',
        'tramite_id',
    ];

     //Relación uno a muchos tramite-ritu INVERSA
     public function tramite()
     {
         return $this->belongsTo(Tramite::class);
     }

}
