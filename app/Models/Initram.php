<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Initram extends Model
{
    use SoftDeletes;
    use HasFactory;

    //Asignación masiva
    protected $fillable = [
        'numruta',
        'fecha',
        'tipo',
        'archivo',
        'tramite_id',
    ];

        //Relación uno a muchos tramite-initram INVERSA
        public function tramite()
        {
            return $this->belongsTo(Tramite::class);
        }
   
}
