<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_index_data()
    {
        $response = $this->get('/books');
        $response->assertStatus(200);
    }

    public function test_stores_data()
    {
        $book = Book::factory()->create();
        $response = $this->post('/books', $book->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('book', $book->toArray());
        $book->delete();
    }

    public function test_edit_data()
    {
        $book = Book::factory()->create();
        $response = $this->get("/books/{$book->id}/edit");
        $response->assertStatus(200);
        $book->delete();
    }

    public function test_update_data()
    {
        $book = Book::factory()->create();

        $updatedBookData = [
            'title' => "Judul Update",
            'author' => "Penulis Update",
            'year' => 2025
        ];

        $response = $this->put("/books/{$book->id}", $updatedBookData);
        $response->assertStatus(302);
        $this->assertDatabaseHas('book', $updatedBookData);
        $book->delete();
    }

    public function test_destroy_data()
    {
        $book = Book::factory()->create();
        $response = $this->delete("/books/{$book->id}");
        $response->assertStatus(302);
        $this->assertDatabaseMissing('book', ['id' => $book->id]);
        $book->delete();
    }
}
