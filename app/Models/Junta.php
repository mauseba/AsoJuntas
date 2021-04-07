<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Junta extends Model
{
    use HasFactory;

    protected $fillable = ['FechaC','Nit','Direccion','Nombre','Correo','D_Recibopago','D_NIT','D_Resolucion','status','Observaciones'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion uno a muchos
    public function userjun(){
        return $this->hasMany(UserJun::class);
    }

    //relacion uno a muchos
    public function psuscripcion(){
        return $this->hasMany(Psuscripcion::class);
    }

    //relacion muchos a muchos

    public function eventos(){

        return $this->belongsToMany(Evento::class);
    }
}
