<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('guest.home');
});

//LOGIN/REGISTER LARAVELUI
Auth::routes();

// CATALOGO PUBLICO
Route::get('/catalog', [BookController::class, 'index'])->name('catalog');

// DASHBOARD DEL USER
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/catalog', [BookController::class, 'userCatalog'])->name('user.catalog');


    Route::post('/reserve/{book}', [ReservationController::class, 'store'])
        ->name('reserve.book');


    Route::post('/reserve/{book}/cancel', [ReservationController::class, 'cancel'])
        ->name('reserve.cancel');


    Route::get('/user/reservations', [ReservationController::class, 'userReservations'])
        ->name('user.reservations');
});

// DASHBOARD DEL ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/books', [BookController::class, 'adminIndex'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');


    // RUTAS DE RESERVAS
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

    Route::post('/reservations/{id}/approve', [ReservationController::class, 'approve'])
        ->name('reservations.approve');

    Route::post('/reservations/{id}/reject', [ReservationController::class, 'reject'])
        ->name('reservations.reject');
});
