<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\TestDatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TestDatabaseSeeder::class);
    }

    /**
     * returns the view login
     */
    public function test_if_login_view_is_returned(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('login');
    }

    /**
     * Logout function redirects to /login after it breaks authentication
     */
    public function test_if_logout_breaks_authentication(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/logout');
        $this->assertGuest();
        $response->assertRedirect('login');
    }
}
