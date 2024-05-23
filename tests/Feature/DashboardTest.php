<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
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
