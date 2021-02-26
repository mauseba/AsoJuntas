<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJun extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa
    public function juntas(){
        return $this->belongsTo(Junta::class);
    }

}
