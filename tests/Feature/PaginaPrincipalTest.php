<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaginaPrincipalTest extends TestCase
{
    /**@test*/
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
