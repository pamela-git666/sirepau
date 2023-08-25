<?php

namespace App\Models\Entidades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Viceminviv extends Model
{
    use SoftDeletes;
    use HasFactory;
      //Asignación masiva
      protected $fillable = [
        'numruta',
        'fecha',
        'observacion',
        'archivo',
        'ritu_id',
    ];
    
    //Relación uno a muchos ritu-viceminviv INVERSA
    public function ritu()
    {
        return $this->belongsTo(Ritu::class);
    }
}
