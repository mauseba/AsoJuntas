<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJun extends Model
{
    use HasFactory;
    
    protected $fillable = ['FechaC','nombre','Tip_identificacion','Num_identificacion','Direccion','Genero','estrato','Edad','Num_contacto','Niv_educacion','Correo','Cargo','junta_id','comision_id'];

    //Relacion uno a muchos inversa
    public function juntas(){
        return $this->belongsTo(Junta::class);
    }
    
    //Relacion uno a muchos inversa
    public function comision(){
        return $this->belongsTo(Comision::class);
    }

    public function censo()
    {
       return $this->hasOne('App\Models\Censo\Censo');
    }
   public function beneficiarios()
  {
       return $this->hasMany('App\Models\Censo\Beneficiarios');
   }


}
