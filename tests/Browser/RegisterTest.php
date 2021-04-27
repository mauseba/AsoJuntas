<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * 
     * @test
     * @throws \Throwable
     */
    public function Un_usuario_puede_registrarse()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Usuario Prueba')
                    ->type('email', 'user_preuba@gmail.com')
                    ->type('password','password')
                    ->type('password_confirmation','password')
                    ->press('#register_btn')
                    ->assertAuthenticated();
        });
    }
}
