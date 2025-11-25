<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // CATALOGO PUBLICO
    public function index()
    {
        $books = Book::all();  

        return view('guest.catalog.index', compact('books'));
    }

   
    // ADMIN — LISTAR LIBROS
    public function adminIndex()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

 
    // ADMIN — MOSTRAR FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('admin.books.create');
    }

  
    // ADMIN — GUARDAR LIBRO NUEVO
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'year' => 'nullable|digits:4|integer',
            'category' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'quantity' => 'required|integer|min:1',
        ]);

        $data = $request->all();

        // GUARDA IMAGEN - FALTA AJUSTARLO...
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Book::create($data);

        return redirect()->route('admin.books.index')->with('success', 'Libro creado correctamente.');
    }


    // ADMIN — EDITAR LIBRO
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

 
    // ADMIN — ACTUALIZAR LIBRO
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'year' => 'nullable|digits:4|integer',
            'category' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'quantity' => 'required|integer|min:1',
        ]);

        $data = $request->all();

        // SUBIR IMAGEN SI EXISTE - FALTA AJUSTAR...
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Libro actualizado.');
    }

 
    // ADMIN — ELIMINAR LIBRO
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Libro eliminado.');
    }
}
