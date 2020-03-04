<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    public function testInicio()
    {
        $response = $this->get('/');
        $response->assertStatus(200)
        ->assertSee("Destacados");

        
    }

    public function testCategoria()
    {
        $response = $this->get('/categoria/2');
        $response->assertStatus(200)
        ->assertSee("Vinilos");

        
    }

    public function testUserpage()
    {
        $response = $this->get('/userpage');
        $response->assertStatus(200)
        ->assertSee("Direccion");

        
    }
}
