<?php

namespace Database\Seeders;

use App\Models\Acta;
use App\Models\Category;
use App\Models\Junta;
use App\Models\Tag;
use App\Models\UserJun;
use Illuminate\Database\Seeder;

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
        Storage::makeDirectory('posts');
        Storage::makeDirectory('NIT');
        Storage::makeDirectory('recibopago');
        Storage::makeDirectory('resolucion');

        $this->call(RoleSeeder::class);
        $this->call(DocumentoSeeder::class);
        $this->call(EstudioSeeder::class);

        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
        Junta::factory(20)->create();
        UserJun::factory(40)->create();
        $this->call(EventoSeeder::class);
        Acta::factory(30)->create();

    }
}
