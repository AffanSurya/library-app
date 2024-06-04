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

// Latihan 1
Route::prefix('latihan1')->group(function () {
    Route::get('/book', function () {
        return view('latihan_1.book', [
            'books' => Book::all()
        ]);
    });

    Route::get('/borrower', function () {
        $borrowers = Borrowing::all();
        $uniqueBorrowers = $borrowers->unique(function ($item) {
            return $item->user->name;
        });
        return view('latihan_1.borrower', [
            'borrowers' => $uniqueBorrowers
        ]);
    });

    Route::get('/borrowing', function () {
        $borrowings = Borrowing::all();
        return view('latihan_1.borrowing', [
            'borrowings' => $borrowings
        ]);
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

// Latihan 2
Route::prefix('latihan2')->group(function () {
    Route::get('/borrower', function () {
        $borrowers = Borrowing::all();
        $uniqueBorrowers = $borrowers->unique(function ($item) {
            return $item->user->name;
        });
        return view('latihan_2.borrower', [
            'borrowers' => $uniqueBorrowers
        ]);
    })->name('borrower2.index');

    // Borrowing
    Route::get('/borrowing', function () {
        $borrowings = Borrowing::all();
        return view('latihan_2.borrowing.index', [
            'borrowings' => $borrowings
        ]);
    })->name('borrowing2.index');

    Route::get('borrowing/{id}/edit', function ($id) {
        $borrowing = Borrowing::findOrFail($id);
        return view('latihan_2.edit', [
            'borrowing' => $borrowing
        ]);
    })->name('borrowing2.edit');

    Route::delete('borrowing/{id}', function ($id) {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->delete();
        return redirect()->route('borrowing2.index');
    })->name('borrowing2.destroy');
});

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
