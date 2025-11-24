<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/catalog', function () {
    return view('guest.catalog.index');
})->name('catalog');