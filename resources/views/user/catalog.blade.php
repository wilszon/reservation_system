@extends('layouts.user')

@section('title', 'Catálogo de Libros')

@section('content')

    <div class="container">

        <h2 class="mb-4 text-center">📚 Catálogo de Libros</h2>

        <div class="row">

            @forelse ($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm book-card">

                        @if ($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top book-cover"
                                alt="Portada">
                        @else
                            <img src="https://via.placeholder.com/300x400?text=Sin+Imagen" class="card-img-top book-cover">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text text-muted">{{ $book->author }}</p>
                            <p class="card-text">{{ Str::limit($book->description, 100) }}</p>

                            <span class="badge bg-primary">{{ $book->category ?? 'General' }}</span>
                            <span class="badge bg-success">📦 {{ $book->quantity }} disponibles</span>

                            <div class="mt-3">
                                @if (in_array($book->id, $userReservations))
                                    <form action="{{ route('reserve.cancel', $book->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger w-100">Cancelar reserva ❌</button>
                                    </form>
                                @else
                                    <form action="{{ route('reserve.book', $book->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-primary w-100">Reservar 📖</button>
                                    </form>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            @empty

                <p class="text-center">No hay libros disponibles todavía.</p>
            @endforelse

        </div>

    </div>

@endsection
