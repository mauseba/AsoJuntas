<?php

namespace Database\Seeders;

use App\Models\Censo\Barrios;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class BarriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('barrios')->truncate();

      $barrios = [
          ['name' => 'Abraham Palacios'],
          ['name' => 'Colinas de Casa Blanca'],
          ['name' => 'Cabrera'],
          ['name' => 'Centro'],
          ['name' => 'El Porvenir'],
      ];
      
      DB::table('barrios')->insert($barrios);
        

    }
}
