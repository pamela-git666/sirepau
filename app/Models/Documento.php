<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    //Asignación masiva
    protected $fillable = [
        'informe',
        'archivo',
        'tramite_id',
    ];

     //Relación uno a muchos tramite-documentos INVERSA
    public function tramite()
    {
        return $this->belongsTo(Tramite::class);
    }
}
