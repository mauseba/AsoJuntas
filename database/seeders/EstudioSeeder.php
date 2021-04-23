<?php

namespace Database\Seeders;

use App\Models\Estudio;
use Illuminate\Database\Seeder;

class EstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estudio::create([
            'prefijo'=>'primaria',
            'nombre'=>'Primaria' 
        ]);
        Estudio::create([
            'prefijo'=> 'secundaria',
            'nombre'=>'Secundaria'
        ]);
        Estudio::create([
            'prefijo'=> 'media',
            'nombre'=>'Edu. media'
        ]);
        Estudio::create([
            'prefijo'=>'universitaria',
            'nombre'=>'Universitaria'
        ]);
        Estudio::create([
            'prefijo'=>'maestria',
            'nombre'=>'Maestria'
        ]);
    }
}
