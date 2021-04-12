<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documento::create(
        [
            'tipo'=> 'CC',
            'nombre'=>'Cedula'
        ]);
        
        Documento::create([
            'tipo'=> 'TI',
            'nombre'=>'T. de identindad'
        ]);
        Documento::create([
            'tipo'=> 'RC',
            'nombre'=>'R. Civil'
        ]);
        
    }
}
