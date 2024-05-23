<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Database\Seeders\TestDatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoanBookTest extends TestCase
{
    
    use RefreshDatabase;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TestDatabaseSeeder::class);
    }
    /**
     *  Choose book to loan returns view with the needed data
     */
    public function test_if_choose_book_to_loan_returns_a_view(): void
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $book = Book::factory()->create();

        $response = $this->get("/loans/book/$book->id");

        $response->assertViewIs('loans.book');
        $response->assertViewHas('book');

    }

    /**
     *  Database suffers changes
     */
    public function test_if_user_can_loan_a_book(): void
    {

        $user = User::factory()->create();
        $book = Book::factory()->create(['quantity' => 5]);

        $this->actingAs($user)->withSession(['user_id' => $user->id]);

        $response = $this->post("/loans/book/$book->id", [
            "time" => 7
        ]);

        $this->assertDatabaseHas('loans', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'status' => 1,
            'days' => 7,
        ]);

        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('response');

    }

    /**
     *  Database suffers changes
     */
    public function test_if_user_can_return_a_book(): void
    {

        $user = User::factory()->create();
        $book = Book::factory()->create(['quantity' => 5]);
        $this->actingAs($user)->withSession(['user_id' => $user->id]);

        $loan = Loan::factory()->create([
            'user_id' => $user->id,
            'book_id' => $book->id,
        ]);

        $response = $this->post("/loans/return/$loan->id");

        $this->assertDatabaseHas('loans', [
            'id' => $loan->id,
            'status' => 0
        ]);

        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('response');

    }
}
