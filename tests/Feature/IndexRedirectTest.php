<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Tests\TestCase;

class IndexRedirectTest extends TestCase
{
    /**
     * Index redirects to login when user is not logged
     */
    public function test_index_redirects_to_login_when_not_logged(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('/login');
    }

    /**
     * Index redirects to login when user is logged
     */
    public function test_index_redirects_to_login_when_logged(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/');
        $response->assertRedirect('/dashboard');
    }
}
