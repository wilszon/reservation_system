@extends('layouts.admin')

@section('title', 'Gestión de Libros')

@section('content')
<div class="container">
    <h2 class="mb-4 fw-bold">📚 Gestión de Libros</h2>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($books->isEmpty())
        <div class="alert alert-info">No hay libros registrados.</div>
    @else
        <div class="card shadow-sm">
            <div class="card-body">

                <table class="table table-hover align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Categoría</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category ?? '—' }}</td>
                            <td>{{ $book->quantity }}</td>

                            <td>
                                <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-warning btn-sm">
                                    ✏️ Editar
                                </a>

                                <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar este libro?')">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    @endif
</div>
@endsection
