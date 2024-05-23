<?php

namespace Tests\Feature;

use Database\Seeders\TestDatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TestDatabaseSeeder::class);
    }

    /**
     * returns the view register
     */
    public function test_if_register_view_is_returned(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertViewIs('register');
    }
    
    /**
     * returns the if register changed database
     */
    public function test_if_register_creates_a_user(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'type' => 1
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('response', [200, 'Cadastro Realizado']);
    }
    
}
