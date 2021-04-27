<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @test
     * @throws \Throwable
     */
    public function Usuarios_registrados_pueden_login()
    {
        $this->withoutMiddleware();

       $user = User::factory()->create();

        $this->browse(function (Browser $browser)  use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password','password')
                    ->press('#login_btn')
                    ->assertAuthenticated();
        });
    }
    /**
     * A Dusk test example.
     *
     * @test
     * @throws \Throwable
     */
    public function Usuarios_no_registrados_no_pueden_loguear()
    {
        $this->withoutMiddleware();

        $this->browse(function (Browser $browser)  {
            $browser->visit('/login')
                    ->type('email', 'juanitoperez@gmail.com')
                    ->type('password','password')
                    ->press('#login_btn')
                    ->assertAuthenticated();
        });
    }
}
