<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('guest.home');
})->name('home');

// LOGIN / REGISTER
Auth::routes();

// CATALOGO PÚBLICO
Route::get('/catalog', [BookController::class, 'index'])->name('catalog');

// USER
Route::middleware(['auth'])->group(function () {

    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/catalog', [BookController::class, 'userCatalog'])->name('user.catalog');

    Route::post('/reserve/{book}', [ReservationController::class, 'store'])->name('reserve.book');

    Route::post('/reserve/{book}/cancel', [ReservationController::class, 'cancel'])->name('reserve.cancel');

    Route::get('/user/reservations', [ReservationController::class, 'userReservations'])
        ->name('user.reservations');


    Route::get('/reservar/{book_id}', [ReservationController::class, 'create'])
        ->name('user.reservations.create');

    Route::post('/reservar/store', [ReservationController::class, 'store'])
        ->name('user.reservations.store');


    // Mostrar formulario de perfil
    Route::get('/user/perfil', function () {
        return view('user.perfil'); // tu vista perfil.blade.php
    })->name('user.profile.edit');

    // Actualizar perfil (POST/PUT)
    Route::put('/user/perfil', [App\Http\Controllers\UserProfileController::class, 'update'])
        ->name('user.profile.update');
});

// ADMIN
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', AdminMiddleware::class])
    ->group(function () {

        // Dashboard correcto
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        // Libros
        Route::get('/books', [BookController::class, 'adminIndex'])->name('books.index');
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

        // Reservas
        Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
        Route::post('/reservations/{id}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');
        Route::post('/reservations/{id}/reject', [ReservationController::class, 'reject'])->name('reservations.reject');

        // Clientes
        Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    });
