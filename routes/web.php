<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/default', function () {
    return view('templates.default');
});

Route::get('author', function() {
    return view('author');
});
Route::get('publisher', function() {
    return view('publisher');
});

Route::get('book', function() {
    return view('book');
});


// Route::get('author', [AuthorController::class, 'index'])->name('author.index');
// Route::get('author/create', [AuthorController::class, 'create'])->name('author.create');
// Route::post('author', [AuthorController::class, 'store'])->name('author.store');
// Route::get('author/{author}', [AuthorController::class, 'show'])->name('author.show');
// Route::get('author/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
// Route::put('author/{id}', [AuthorController::class, 'update'])->name('author.update');
// Route::delete('author/{id}', [AuthorController::class,]);
Route::resource('author', AuthorController::class)->middleware('auth');
    
//Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index');
//Route::get('/publisher/publisher-create', [PublisherController::class, 'create'])->name('publisher.create');
//Route::post('/publisher', [PublisherController::class, 'store'])->name('publisher.store');
//Route::get('/publisher/{id}/publisher-edit', [PublisherController::class, 'edit'])->name('publisher.edit');
//Route::put('/publisher/{id}', [PublisherController::class, 'update'])->name('publisher.update');
//Route::delete('/publisher/{id}', [PublisherController::class, 'destroy'])->name('publisher.destroy');
Route::resource('publisher', PublisherController::class)->middleware('auth');

//Route::get('/book', [BookController::class, 'index'])->name('book.index')->middleware(['auth', 'verified']);
//Route::get('/book/book-create', [BookController::class, 'create'])->name('book.create')->middleware(['auth', 'verified']);
//Route::post('/book', [BookController::class, 'store'])->name('book.store')->middleware(['auth', 'verified']);
//Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit')->middleware(['auth', 'verified']);
//Route::get('/book/{id}/show', [BookController::class, 'show'])->name('book.show')->middleware(['auth', 'verified']);
//Route::put('/book/{id}', [BookController::class, 'update'])->name('book.update')->middleware(['auth', 'verified']);
//Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.destroy')->middleware(['auth', 'verified']);
Route::resource('book', BookController::class)->middleware('auth');

Route::get('/book/search', [BookController::class, 'search']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
