<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;

    protected $fillable = ['url','url2','evento_id'];


    //Relacion uno a muchos inversa
    public function eventos(){
        return $this->belongsTo(Evento::class);
    }
}
