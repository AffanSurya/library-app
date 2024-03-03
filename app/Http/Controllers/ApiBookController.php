<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(3);
        return new BookCollection($books);
    }

    public function show($id) {
        $book = Book::findOrFail($id);
        return new BookResource($book);
    }

    public function store(Request $request) {
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->year = $request->input('year');
        $book->save();

        return response()->json(
            ['message' => 'Book created successfully',201]
        );
    }

    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->year = $request->input('year');
        $book->save();

        return response()->json(
            ['message' => 'Book updated successfully',200]
        );
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(
            ['message' => 'Book deleted successfully']
        );
    }


}
