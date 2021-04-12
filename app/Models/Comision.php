<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    use HasFactory;

    protected $fillable = ['comision','Tipo'];

    //relacion uno a muchos
    public function userjun(){
        return $this->hasMany(UserJun::class);
    }
}

