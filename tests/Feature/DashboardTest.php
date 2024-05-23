<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\TestDatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    
    protected function setUp(): void
    {
        parent::setUp();

        // Rodar seeders para testes
        $this->seed(TestDatabaseSeeder::class);
    }
    /**
     * Dashboard loads dashboard view with the needed data
     */
    public function test_returns_view_with_loans_data(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/dashboard');
        
        $response->assertViewIs('dashboard');
        $response->assertViewHas('loans');
    }
}
