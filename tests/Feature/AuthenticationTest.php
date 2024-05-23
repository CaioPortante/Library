<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\TestDatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Rodar seeders para testes
        $this->seed(TestDatabaseSeeder::class);
    }

    /**
     * Successful autentication returns to home with session data
     */
    public function test_successful_autentication_returns_to_home_with_session_set(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('123'),
        ]);

        $response = $this->post('/authenticate', [
            'email' => 'test@example.com',
            'password' => '123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/');
        $response->assertSessionHasAll([
            'user_id' => $user->id,
            'user_type' => $user->type,
            'user_name' => $user->name,
        ]);
    }

    /**
     * Failed autentication returns to home with session data
     */
    public function test_failed_autentication_redirects_back_with_response(): void
    {
        $response = $this->post('/authenticate', [
            'email' => 'wrong@example.com',
            'password' => '123',
        ]);

        $this->assertGuest();
        $response->assertRedirect();
        $response->assertSessionHas('response', [400, 'Credenciais inválidas.']);
    }
}
