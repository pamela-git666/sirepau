<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model
{
    use SoftDeletes;
    use Loggable;
    use HasFactory;

     //Asignación masiva
     protected $fillable = [
        'ci',
        'apellidos',
        'nombres',
        'cargo',
        'celular',
        'user_id',
    ];

    //relación uno a uno inversa use-director
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
