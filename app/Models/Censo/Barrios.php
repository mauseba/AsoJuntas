<?php

namespace App\Models\Censo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrios extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function barrios(){
        return $this->belongsTo(Barrios::class);
    }

}
