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