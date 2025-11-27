@extends('layouts.user')

@section('title', 'Reservar Libro')

@section('content')
    <div class="container py-4">

        <div class="mb-3">
            <a href="{{ route('user.catalog') }}" class="btn btn-gradient btn-circle">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <!-- CARD PRINCIPAL -->
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <!-- ENCABEZADO -->
            <div class="card-header text-white" style="background: linear-gradient(135deg, #4b0e84, #78155d);">
                <h4 class="mb-0">
                    <i class="bi bi-journal-bookmark"></i> Reservar Libro
                </h4>
            </div>

            <div class="card-body p-4">

                <div class="row g-4">

                    <!-- COLUMNA IZQUIERDA: INFO DEL LIBRO -->
                    <div class="col-md-5">

                        <div class="card border-0 shadow-sm">
                            <img src="{{ asset('storage/' . $book->cover_image) }}" style="height:250px; width: 100%;"
                                class="card-img-top" alt="Portada del libro">

                            <div class="card-body">
                                <h5 class="fw-bold">{{ $book->title }}</h5>
                                <p class="text-muted mb-1"><i class="bi bi-person"></i> {{ $book->author }}</p>
                                <p class="text-muted mb-3"><i class="bi bi-tags"></i> {{ $book->category }}</p>

                                <p style="font-size: 0.9rem;">
                                    {{ $book->description }}
                                </p>

                                <span class="badge bg-success mt-2">
                                    Disponible
                                </span>
                            </div>
                        </div>

                    </div>

                    <!-- COLUMNA DERECHA: FORMULARIO -->
                    <div class="col-md-7">

                        <div class="card border-0 shadow-sm p-4">

                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-pencil-square"></i> Completar Reserva
                            </h5>

                            <form action="{{ route('user.reservations.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="book_id" value="{{ $book->id }}">

                                <!-- FECHA INICIO -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Fecha de préstamo</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>

                                <!-- FECHA DEVOLUCIÓN -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Fecha de devolución</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>

                                <!-- OBSERVACIONES -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Observaciones (opcional)</label>
                                    <textarea name="observations" class="form-control" rows="4"
                                        placeholder="Escribe alguna nota adicional si lo deseas..."></textarea>
                                </div>

                                <!-- BOTÓN -->
                                <button type="submit" class="btn w-100 text-white fw-bold"
                                    style="background: linear-gradient(135deg, #4b0e84, #78155d);">
                                    <i class="bi bi-check-circle"></i> Reservar Libro
                                </button>

                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
