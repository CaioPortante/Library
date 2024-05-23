<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Database\Seeders\TestDatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookControlTest extends TestCase
{
    use RefreshDatabase;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TestDatabaseSeeder::class);
    }
    /**
     * Returns books dashboard with its data
     */
    public function test_returns_view_with_books_data(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/admin/books');
        
        $response->assertViewIs('books.index');
        $response->assertViewHas('books');
    }
    /**
     * Returns add book form
     */
    public function test_returns_add_book_view(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/admin/books/add');
        
        $response->assertViewIs('books.add');
    }
    /**
     * Save new book
     */
    public function test_add_new_book(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/admin/books/add', [
            'title' => 'Test Book Title',
            'author' => 'Test Author',
            'isbn' => '000:000000000',
            'description' => "Basic description",
            'quantity' => 10,
        ]);

        $this->assertDatabaseHas('books', [
            'title' => 'Test Book Title',
        ]);
        
        $response->assertRedirect('/admin/books');
        $response->assertSessionHas('response');
    }
    /**
     * Returns update book form
     */
    public function test_returns_update_book_view(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $book = Book::factory()->create();

        $response = $this->get("/admin/books/edit/$book->id");
        
        $response->assertViewIs('books.edit');
        $response->assertViewHas('book');
    }
    /**
     * Save book update
     */
    public function test_update_book(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $book = Book::factory()->create();

        $response = $this->post("/admin/books/edit/save/$book->id", [
            'title' => 'Test Book Title Changed',
            'author' => $book->author,
            'isbn' => $book->isbn,
            'description' => $book->description,
            'quantity' => $book->quantity,
        ]);

        $this->assertDatabaseHas('books', [
            'title' => 'Test Book Title Changed',
        ]);
        
        $response->assertRedirect('/admin/books');
        $response->assertSessionHas('response');
    }
    /**
     * Returns books list dashboard with its data
     */
    public function test_returns_books_list_view(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/books/list');
        
        $response->assertViewIs('books.list');
    }
    /**
     * Save book update
     */
    public function test_search_books(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $book = Book::factory()->create([
            'title'=>'Test Book'
        ]);

        $response = $this->post("/books/list/search", [
            'search' => 'Test Book',
        ]);
        
        $response->assertStatus(200);
    }
    /**
     * Delete book
     */
    public function test_if_book_is_deleted(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $book = Book::factory()->create();

        $response = $this->post("/admin/books/delete/$book->id");
        
        $response->assertRedirect();
        $response->assertSessionHas('response');
    }
}
