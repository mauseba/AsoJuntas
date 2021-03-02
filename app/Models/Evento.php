<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable=[
        'Fecha',
        'hora_inicio',
        'hora_final',
        'hora_inicio',
        'Asunto',
        'descripcion'
    ];
    
    //relacion muchos a muchos

    public function juntas(){

        return $this->belongsToMany(Junta::class);
    }
}
