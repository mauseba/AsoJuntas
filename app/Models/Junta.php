<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Junta extends Model
{
    use HasFactory;

    //relacion uno a muchos

    public function userjun(){

        return $this->hasMany(UserJun::class);

    }

    //relacion muchos a muchos

    public function eventos(){

        return $this->belongsToMany(Evento::class);
    }
}
