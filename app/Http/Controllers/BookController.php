<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Catálogo público
    public function index()
    {
        $books = Book::all();  // Traemos todos los libros

        return view('guest.catalog.index', compact('books'));
    }
}
