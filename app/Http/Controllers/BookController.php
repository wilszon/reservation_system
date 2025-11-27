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


    // CATALOGO USUARIO AUTENTICADO
    public function userCatalog()
    {
        $books = Book::all();

        $userReservations = auth()->user()
            ->reservations()
            ->pluck('book_id')
            ->toArray();

        return view('user.catalog', compact('books', 'userReservations'));
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
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'title.required' => 'El título es obligatorio.',
            'author.required' => 'El autor es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
            'year.required' => 'El año es obligatorio.',
            'year.integer' => 'El año debe ser un número válido.',
            'year.min' => 'El año debe ser mayor o igual a 1000.',
            'year.max' => 'El año no puede ser mayor al año actual.',
            'category.required' => 'La categoría es obligatoria.',
            'quantity.required' => 'La cantidad es obligatoria.',
            'quantity.min' => 'La cantidad no puede ser negativa.',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        // Aquí metes el try/catch
        try {
            Book::create($data);
            return redirect()->route('admin.books.index')->with('success', 'Libro creado correctamente.');
        } catch (\Exception $e) {
            // Opcional: puedes loguear el error para depuración
            Log::error('Error al crear libro: ' . $e->getMessage());

            return redirect()->back()->with('error', 'No se pudo crear el libro. Intente nuevamente.');
        }
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
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'title.required' => 'El título es obligatorio.',
            'author.required' => 'El autor es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
            'year.required' => 'El año es obligatorio.',
            'year.integer' => 'El año debe ser un número válido.',
            'year.min' => 'El año debe ser mayor o igual a 1000.',
            'year.max' => 'El año no puede ser mayor al año actual.',
            'category.required' => 'La categoría es obligatoria.',
            'quantity.required' => 'La cantidad es obligatoria.',
            'quantity.min' => 'La cantidad no puede ser negativa.',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Libro actualizado correctamente.');
    }


    // ADMIN — ELIMINAR LIBRO
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Libro eliminado.');
    }
}
