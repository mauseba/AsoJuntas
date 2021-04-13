<?php

namespace App\Models\Censo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    use HasFactory;
     
    // protected $fillable = ['name', 'tipo_doc', 'numero', 'edad','genero','tipo_salud','salud','discap','nivel_edu'];
    protected $table = 'beneficiarios';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
