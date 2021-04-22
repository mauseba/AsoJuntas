<?php

namespace App\Models\Censo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Censo extends Model
{
    use HasFactory;

    protected $table = 'censo';
    //protected $fillable = ['barrio','direccion','tipo_vivienda','energia','gas','agua','alcantarilla','escrituras','sisben','sub_vivienda','piso','techo','pañete','baños','baño_nuevo','vivienda_nueva'];
    public function user()
     {
        return $this->belongsTo('App\Models\UserJun');
    }
    public function beneficiarios(){
        return $this->hasMany('App\Models\Censo\Beneficiarios');
    }
}
