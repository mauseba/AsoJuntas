<?php

namespace App\Models\Censo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'tipo_doc', 'numero', 'edad', 'genero', 'tipo_salud', 'salud', 'discap', 'nivel_edu', 'user_id', 'sub_gobierno',
        'nucleo_fam', 'barrio',
    ];
    // protected $table = 'beneficiarios';

    public function user()
    {
        return $this->belongsTo('App\Models\UserJun');
    }
    public function censo()
    {
        return $this->hasOne('App\Models\Censo\Censo');
    }
    public function junta()
    {
        return $this->hasOne('App\Models\Junta');
    }
    public function barrio()
    {
        return $this->hasOne('App\Models\Censo\Barrios');
    }
}
