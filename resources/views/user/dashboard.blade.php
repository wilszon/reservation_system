@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">

    <h2 class="text-center text-dark fw-bold mb-5" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
        Bienvenido, {{ auth()->user()->first_name }}
    </h2>

    <div class="row g-4">

        
        <!-- Card de catalogo -->
        <div class="col-md-4">
            <div class="card shadow-lg h-100">
                <div class="card-header text-white fw-bold" style="background: linear-gradient(135deg, #4b0e84, #78155d);">
                    📖 Ver Catálogo
                </div>
                <div class="card-body bg-white">
                    <p class="card-text fw-bold">Mira nuestro amplio catalogo.</p>
                    <a href="{{ route('user.catalog') }}" class="btn btn-outline-primary w-100 mt-2">Ver Catálogo</a>
                </div>
            </div>
        </div>

        <!-- Card de libros reservados -->
        <div class="col-md-4">
            <div class="card shadow-lg h-100">
                <div class="card-header text-white fw-bold" style="background: linear-gradient(135deg, #4b0e84, #78155d);">
                    📚 Libros Reservados
                </div>
                <div class="card-body bg-white">
                    <p class="card-text fw-bold">Aquí aparecerán tus reservas.</p>
                    <a href="{{ route('user.reservations') }}" class="btn btn-outline-primary w-100 mt-2">
                        Ver reservas
                    </a>
                </div>
            </div>
        </div>

        <!-- Card de perfil -->
        <div class="col-md-4">
            <div class="card shadow-lg h-100">
                <div class="card-header text-white fw-bold" style="background: linear-gradient(135deg, #4b0e84, #78155d);">
                    👤 Mi Perfil
                </div>
                <div class="card-body bg-white">
                    <p class="card-text fw-bold">Modifica tus datos personales.</p>
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-outline-primary w-100 mt-2">
                        Editar perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
