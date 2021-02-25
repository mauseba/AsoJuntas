<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juntas extends Model
{
    use HasFactory;

    //relacion uno a muchos

    public function userjun(){

        return $this->hasMany(UserJun::class);

    }
}
