<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJun extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre','Tip_identificacion','Num_identificacion','Num_contacto','Niv_educacion','Correo','Cargo','junta_id'];

    //Relacion uno a muchos inversa
    public function juntas(){
        return $this->belongsTo(Junta::class);
    }

}
