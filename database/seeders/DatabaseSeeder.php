<?php

namespace Database\Seeders;

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
        Storage::makeDirectory('posts');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
        Junta::factory(20)->create();
        UserJun::factory(40)->create();
        $this->call(EventoSeeder::class);

    }
}
