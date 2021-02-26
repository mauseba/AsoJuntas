<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    
    //relacion muchos a muchos

    public function juntas(){

        return $this->belongsToMany(Junta::class);
    }
}
