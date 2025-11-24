<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('guest.home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/catalog', function () {
    return view('guest.catalog.index');
})->name('catalog');

Route::get('/catalog', [BookController::class, 'index'])->name('catalog');

// Rutas para el administrador
Route::prefix('admin')->name('admin.')->group(function () {

    // Listado de libros
    Route::get('/books', [BookController::class, 'adminIndex'])->name('books.index');

    // Crear libro
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

    // Editar libro
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

    // Eliminar libro
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});