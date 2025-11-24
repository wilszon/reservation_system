@extends('layouts.guest')

@section('title', 'Catálogo de Libros')

@section('content')

<div class="container">

    <h2 class="mb-4 text-center">📚 Catálogo de Libros</h2>

    <div class="row">

        @forelse ($books as $book)

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">

                    @if ($book->cover_image)
                        <img src="{{ $book->cover_image }}" class="card-img-top" alt="Portada">
                    @else
                        <img src="https://via.placeholder.com/300x400?text=Sin+Imagen" class="card-img-top">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text text-muted">{{ $book->author }}</p>
                        <p class="card-text">{{ Str::limit($book->description, 100) }}</p>

                        <span class="badge bg-primary">{{ $book->category ?? 'General' }}</span>
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
