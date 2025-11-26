@extends('layouts.guest')

@section('title', 'Inicio')

@section('content')

<!-- HERO PRINCIPAL -->
<div class="container-fluid ">
     <div class="p-5 text-center rounded-3 shadow-sm hero-gradient">
        <h1 class="display-5 fw-bold">Descubre y Reserva tus Libros Favoritos</h1>
        <p class="lead mt-3">
            La forma más fácil de reservar libros y gestionar tus préstamos desde un solo lugar.
        </p>
        <div class="mt-4">
            <a href="{{ route('catalog') }}" class="btn btn-success btn-lg me-2">Explorar Catálogo</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Crear Cuenta</a>
        </div>
    </div>
</div>

<!-- SECCIÓN DE BENEFICIOS -->
<div class="container mt-5">
    <h2 class="text-center mb-4">¿Qué ofrecemos?</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Catálogo completo</h5>
                    <p class="card-text">Explora todos los libros disponibles en nuestra biblioteca digital.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Reservas rápidas</h5>
                    <p class="card-text">Haz tu reserva con un solo clic, sin procesos complicados.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Gestión personal</h5>
                    <p class="card-text">Revisa tus préstamos, fechas de devolución y tus reservas actuales.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
