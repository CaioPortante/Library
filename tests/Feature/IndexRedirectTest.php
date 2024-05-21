<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexRedirectTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_index_returns_a_redirect(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
