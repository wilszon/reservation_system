@extends('layouts.guest')

@section('title', 'Catálogo')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4 text-center">Catálogo de Libros</h1>

    <div class="row g-4">

        <!-- Libro 1 (ejemplo) -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="https://via.placeholder.com/300x400" class="card-img-top" alt="Libro">
                <div class="card-body">
                    <h5 class="card-title">Título de libro</h5>
                    <p class="card-text">Descripción corta del libro.</p>
                </div>
                <div class="card-footer bg-white">
                    <button class="btn btn-primary w-100" disabled>
                        Reservar (requiere login)
                    </button>
                </div>
            </div>
        </div>

        <!-- Libro 2 (ejemplo) -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="https://via.placeholder.com/300x400" class="card-img-top" alt="Libro">
                <div class="card-body">
                    <h5 class="card-title">Otro libro</h5>
                    <p class="card-text">Descripción corta del libro.</p>
                </div>
                <div class="card-footer bg-white">
                    <button class="btn btn-primary w-100" disabled>
                        Reservar (requiere login)
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
