<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eps')->truncate();

        $eps = [
            ['name' => 'Medimas'],
            ['name' => 'Sanitas'],
            ['name' => 'Cafesalud'],
        ];

        DB::table('eps')->insert($eps);
    }
}
