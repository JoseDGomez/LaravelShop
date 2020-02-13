<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestClient extends TestCase
{
    /**
     * A basic test example.
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
