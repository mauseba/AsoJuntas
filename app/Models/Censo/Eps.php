<?php

namespace App\Models\Censo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eps extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function eps()
    {
        return $this->belongsTo(Eps::class);
    }
    public function beneficiarios()
    {
        return $this->belongsTo(Censo::class);
    }
}
