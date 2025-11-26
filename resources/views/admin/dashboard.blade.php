@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <!-- TITULO -->
    <h1 class="text-center mb-2 section-title-black">
        <i class="bi bi-speedometer2"></i> Panel de Administración
    </h1>
    <p class="text-center text-muted mb-4">Bienvenido, {{ Auth::user()->name }}</p>

    <!-- METRICAS -->
    <div class="row g-4">

        <!-- Libros -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 metric-card">
                <div class="card-body text-center">
                    <i class="bi bi-book-half metric-icon"></i>
                    <h3 class="metric-number">{{ $totalBooks ?? 0 }}</h3>
                    <p class="metric-label">Libros Registrados</p>
                </div>
            </div>
        </div>

        <!-- Usuarios -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 metric-card">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill metric-icon"></i>
                    <h3 class="metric-number">{{ $totalUsers ?? 0 }}</h3>
                    <p class="metric-label">Usuarios Registrados</p>
                </div>
            </div>
        </div>

        <!-- Reservas Pendientes -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 metric-card">
                <div class="card-body text-center">
                    <i class="bi bi-hourglass-split metric-icon"></i>
                    <h3 class="metric-number">{{ $pendingReservations ?? 0 }}</h3>
                    <p class="metric-label">Reservas Pendientes</p>
                </div>
            </div>
        </div>

        <!-- Reservas Aprobadas -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 metric-card">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle-fill metric-icon"></i>
                    <h3 class="metric-number">{{ $approvedReservations ?? 0 }}</h3>
                    <p class="metric-label">Reservas Aprobadas</p>
                </div>
            </div>
        </div>

    </div>

    <!-- SECCION DE TABLAS O GRAFICAS -->
    <div class="row mt-5">

        <!-- Ultimas Reservas -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header table-header-gradient text-white fw-bold">
                    <i class="bi bi-clock-history"></i> Últimas Reservas
                </div>
                <div class="card-body">
                    <p class="text-muted">Aquí podrás mostrar las últimas reservas del sistema.</p>
                </div>
            </div>
        </div>

        <!-- Usuarios recientes -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header table-header-gradient text-white fw-bold">
                    <i class="bi bi-person-lines-fill"></i> Usuarios Recientes
                </div>
                <div class="card-body">
                    <p class="text-muted">Aquí podrás mostrar los usuarios registrados recientemente.</p>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
