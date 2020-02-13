<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestCliente extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInicio()
    {
        $response = $this->get('/');
        $response->assertStatus(200)
        ->assertSee("Musitrend tocadiscos");

        
    }

    public function testCategoria(){
        $response = $this->get('/categoria/1');
        $response->assertStatus(200)
        ->assertSee("Musitrend tocadiscos");
    }
}
