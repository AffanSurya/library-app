<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return "Hello World";
});

// required parameters
Route::get('/book/{id}', function (string $id) {
    return "Book Id = " . $id;
});

// optional parameters
Route::get('/book-title/{title?}', function (?string $title = "Bumi Manusia") {
    return "Book title = " . $title;
});

// named routes
Route::get('/book-profile', function () {
    return "Book profile Page";
})->name('book-profile');

// router prefixes
Route::prefix('admin')->group(function () {
    Route::get('/books', function () {
        return "Semua buku dari halaman admin";
    });

    Route::get('/authors', function () {
        return "<h1>Semua author dari halaman admin</h1>";
    });
});

Route::get('/book-simple', function () {
    return view('book_simple', ['title' => "Bumi Manusia"]);
});

// route books page
// route untuk menampilkan index view dengan data buku
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// route untuk menampilkan form tambah buku
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// route untuk menyimpan data buku yang baru ditambahkan
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// route untuk menampilkan form edit
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// route untuk menyimpan data buku yang telah di ubah
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

// route untuk menghapus data buku
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('/user-profile/{user_id}', function (string $id) {
    $user = User::find($id);
    echo $user->name;
    echo "<br>";
    echo $user->profile->address;
});

Route::get('/borrowing', function () {
    $borrowing = Borrowing::all();

    foreach ($borrowing as $key => $value) {
        echo "Book: " . $value->book->title . " | User: " . $value->user->name;
        echo "<br>";
    }
});

Route::get('/borrower/{user_id}', function (string $id) {
    $borrower = User::find($id);
    echo "$borrower->name";
    echo "<br>";

    foreach ($borrower->borrowings as $key => $value) {
        echo "Book: " . $value->book->title;
        echo "<br>";
    }
});

Route::get('/book-borrow/{book_id}', function (string $id) {
    $book = Book::find($id);
    echo "$book->title";
    echo "<br>";

    foreach ($book->borrowings as $key => $value) {
        echo "Borrower: " . $value->user->name;
        echo "<br>";
    }
});
