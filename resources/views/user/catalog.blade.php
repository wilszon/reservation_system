@extends('layouts.user')

@section('title', 'Catálogo de Libros')

@section('content')

    <div class="container">

        <div class="mb-3">
            <a href="{{ route('user.dashboard') }}" class="btn btn-gradient btn-circle">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>

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
                            <p class="card-text">{{ Str::limit($book->description, 100) }}</p>

                            <span class="badge bg-primary">{{ $book->category ?? 'General' }}</span>
                            <span class="badge bg-success">📦 {{ $book->quantity }} disponibles</span>

                            <div class="mt-3">

                                @foreach ($books as $book)
                                    @php
                                        $reservation = \App\Models\Reservation::where('user_id', auth()->id())
                                            ->where('book_id', $book->id)
                                            ->whereIn('status', ['pendiente', 'aprobada'])
                                            ->first();
                                    @endphp

                                    <div class="mt-3">
                                        @if ($reservation)
                                            {{-- RESERVA PENDIENTE --}}
                                            @if ($reservation->status == 'pendiente')
                                                <button class="btn btn-warning w-100 disabled">
                                                    En espera de aprobación ⏳
                                                </button>

                                                {{-- RESERVA APROBADA --}}
                                            @elseif ($reservation->status == 'aprobada')
                                                <button class="btn btn-success w-100 disabled">
                                                    Reserva Aceptada ✔️
                                                </button>

                                                {{-- OPCIONAL: botón para ver mis reservas --}}
                                                <a href="{{ route('user.reservations') }}"
                                                    class="btn btn-outline-primary w-100 mt-2">
                                                    Ver mi reserva 📚
                                                </a>
                                            @endif
                                        @elseif ($book->quantity <= 0)
                                            {{-- SIN STOCK --}}
                                            <button class="btn btn-secondary w-100 disabled">
                                                No Disponible 🚫
                                            </button>
                                        @else
                                            {{-- DISPONIBLE PARA RESERVAR --}}
                                            <a href="{{ route('user.reservations.create', $book->id) }}"
                                                class="btn btn-outline-primary w-100">
                                                Reservar 📖
                                            </a>
                                        @endif
                                    </div>
                            </div>
            @endforeach

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
