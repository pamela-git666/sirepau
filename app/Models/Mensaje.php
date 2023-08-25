<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensaje extends Model
{
    use SoftDeletes;
    use HasFactory;

     //Asignación masiva
     protected $fillable = [
        'status',
        'mensaje',
        'tramite_id',
        'user_id'   
    ];

    //constructor de las opciones de status 
    const NUEVO = 1;  //Nuevo
    const ALERTA = 2; //Alerta

    //Relación uno a muchos user-mensaje INVERSA
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
