<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psuscripcion extends Model
{
    use HasFactory;

    protected $fillable = ['FechaP','Mes','tipo','Comprobante','Observaciones','junta_id'];

    //Relacion uno a muchos inversa
    public function juntas(){
        return $this->belongsTo(Junta::class);
    }
}
