@extends('layouts.guest')

@section('title', 'Catálogo de Libros')

@section('content')

    <div class="container">

        <h2 class="mb-4 text-center fw-bold">📚 Catálogo de Libros</h2>

        <!-- Barra de búsqueda -->
        <div class="container mb-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="searchInput" class="form-control"
                            placeholder="Buscar por título, autor o categoría...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Cards de libros -->
        <div class="row" id="booksContainer">
            @forelse ($books as $book)
                <div class="col-md-3 mb-3 book-card">
                    <div class="card h-100 shadow-sm">
                        @if ($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top book-cover"
                                alt="Portada">
                        @else
                            <img src="https://via.placeholder.com/300x400?text=Sin+Imagen" class="card-img-top book-cover">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text text-muted">Autor: {{ $book->author }}</p>
                            <p class="card-text text-muted">Año de publicación: {{ $book->year }}</p>
                            <span class="badge bg-primary">Categoría: {{ $book->category ?? 'General' }}</span>
                            <span class="badge bg-success">📦 {{ $book->quantity }} disponibles</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No hay libros disponibles todavía.</p>
            @endforelse
        </div>
    </div>

@endsection
