<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcertificado extends Model
{
    use HasFactory;

    protected $fillable = ['FechaP','junta','Nit','Resolucion','nombre','Direccion','Tdocumento','Documento','Expedido','tipo','Comprobante','Observaciones','Estado'];
}
