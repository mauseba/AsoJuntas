<?php

namespace Database\Seeders;

use App\Models\Acta;
use App\Models\Category;
use App\Models\Junta;
use App\Models\Tag;
use App\Models\UserJun;
use Illuminate\Database\Seeder;
use App\Models\Comision;
use App\Models\Psuscripcion;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::deleteDirectory('NIT');
        Storage::deleteDirectory('recibopago');
        Storage::deleteDirectory('resolucion');
        Storage::deleteDirectory('Actas');
        Storage::deleteDirectory('Comprobantes');
        Storage::deleteDirectory('logos');
        
        Storage::makeDirectory('posts');
        Storage::makeDirectory('NIT');
        Storage::makeDirectory('recibopago');
        Storage::makeDirectory('resolucion');
        Storage::makeDirectory('Actas');
        Storage::makeDirectory('Comprobantes');
        Storage::makeDirectory('logos');

        $this->call(RoleSeeder::class);
        $this->call(DocumentoSeeder::class);
        $this->call(EstudioSeeder::class);

        $this->call(UserSeeder::class);
        
        Comision::factory(6)->create();
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
        Junta::factory(20)->create();
        UserJun::factory(40)->create();
        $this->call(EventoSeeder::class);
        //Acta::factory(30)->create();
        Psuscripcion::factory(10)->create();

    }
}
