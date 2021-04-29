<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Support\Str;

use Tests\TestCase;



class PaginaAdminTest extends TestCase 
{
    use  RefreshDatabase;

     /** @test */
     public function pagina_principal_mostrando()
     {
         //Given-> Teniendo
         //when-> Cuando 
         //then-> Entonces
         $response = $this->get('/');
 
         $response->assertStatus(200);
     }
     
       /** @test */
     public function eventos_en_la_pagina_principal()
     {
         //Given-> Teniendo
         //when-> Cuando 
         //then-> Entonces
         $response = $this->get('eventos');
 
         $response->assertStatus(200);
     }
 
     /** @test */
     public function ventana_login()
     {
         //Given-> Teniendo
         //when-> Cuando 
         //then-> Entonces
         $response = $this->get('/login');
 
         $response->assertStatus(200);
     } 
 
     /** @test */
     public function login_succes()
     {
         //Given-> Teniendo
         //when-> Cuando 
         //then-> Entonces
 
         $response = $this->get('/login');
 
         $response->assertStatus(200);
     } 
 
     /** @test */
     public function ventana_registro()
     {
         //Given-> Teniendo
         //when-> Cuando 
         //then-> Entonces
         $response = $this->get('/register');
 
         $response->assertStatus(200);
     }

    /** @test */
    public function un_usuario_autenticado_puede_crear_una_categoria()
    {
        $this->withoutMiddleware();


        //Given-> Teniendo

        $user = User::factory()->create();

        $this->actingAs($user);
        //when-> Cuando
        $this->post(route('admin.categories.store'),[
            'name' => 'Nosotros',
            'slug' => Str::slug('Nosotros')
        ]);
    
        //then-> Entonces
        $this->assertDatabaseHas('categories',[
            'name'=>'Nosotros','slug'=>Str::slug('Nosotros')
        ]);

        $Category = Category::all()->random()->slug;

        $response = $this->get('category/'.$Category);

        $response->assertStatus(200);

    }

    /** @test */
    public function un_usuario_autenticado_puede_crear_una_tag()
    {
        $this->withoutMiddleware();


        //Given-> Teniendo

        $user = User::factory()->create();

        $this->actingAs($user);
        //when-> Cuando
       $this->post(route('admin.tags.store'),[
            'name' => 'Juntas',
            'slug' => Str::slug('Juntas'),
            'color' => 'green'
        ]);
    
        //then-> Entonces
        $this->assertDatabaseHas('tags',[
            'name' => 'Juntas',
            'slug' => Str::slug('Juntas'),
            'color' => 'green'
        ]);

        $Tag = Tag::all()->random()->slug;

        $response = $this->get('tag/'.$Tag);

        $response->assertStatus(200);

    }
    /** @test */
    public function un_usuario_autenticado_puede_crear_un_post(){

        $this->withoutMiddleware();

        //Given-> Teniendo
        $user = User::factory()->create();
        
        $this->actingAs($user);

        $category = Category::factory()->create();

        $tag = Tag::factory()->create();
        //when-> Cuando
        $this->post(route('admin.posts.store'),[
            'name' => 'post de prueba',
            'slug' => Str::slug('post de prueba'),
            'extract' =>' Extracto de prueba ',
            'body' =>'Contenido de prueba',
            'status' => '1',
            'tag' =>$tag->id,
            'user_id' => $user->id,
            'category_id' => $category->id
            
            ]); 
        
        //then-> Entonces
        $this->assertDatabaseHas('posts',[
            'name' => 'post de prueba',
            'slug' => Str::slug('post de prueba'),
            'extract' =>'Laborum voluptatem sit magnam dolorum placeat. Iste dolorem ut nobis eius eligendi dolor non cum. Dolorem error reiciendis provident odit omnis. Consectetur aliquam rem dolores autem iure enim.',
            'body' => 'Quia saepe optio et velit voluptas. Et dolor ex aut et. Laboriosam molestias totam ratione sit vero ipsa. Inventore ut nulla alias vero. Distinctio delectus quisquam distinctio sed aliquid. Voluptatibus tenetur doloremque non fugiat. Aut ullam velit ut. Eos et ad et fuga quasi beatae enim. Ipsum sit voluptatem dolores accusantium eum quod sed. Aliquid ut temporibus et explicabo consequatur est maiores. Unde repudiandae dolores doloremque. Fugiat aut dolores cupiditate accusamus voluptas. Aut rerum dolorem ad nam qui dolor. Error et reprehenderit aut eveniet. Veritatis similique praesentium architecto quidem et. Dolorem accusantium dignissimos eligendi atque quia corrupti in. Deserunt repudiandae magnam fugit ipsum. Voluptate',
            'status' => '1',
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        $post = Post::all()->random()->id;

        $response = $this->get('posts/'.$post);

        $response->assertStatus(403);

    }

     /** @test */
     public function un_usuario_se_loguea(){

        $this->withoutMiddleware();

        //Given-> Teniendo
        $user = User::factory()->create();
        
        //when-> Cuando
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'password',
        ]);


        //then-> Entonces
        
        
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);

    }

}
