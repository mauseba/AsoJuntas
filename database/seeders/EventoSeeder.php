<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventos = Evento::factory(50)->create();

        foreach($eventos as $evento){
             
            $evento->juntas()->attach([
                rand(1,20)
            ]);
        }
    }
}
