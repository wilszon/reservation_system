@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Bienvenido, {{ Auth::user()->name }} 🎉</h5>
                </div>

                <div class="card-body">

                    <p class="lead">
                        Este es tu panel principal. Desde aquí podrás gestionar tus reservas,
                        navegar por el catálogo de libros y revisar tu historial.
                    </p>

                    <hr>

                    <div class="row text-center">

                        <div class="col-md-4 mb-3">
                            <a href="{{ route('user.catalog') }}" class="btn btn-primary w-100">
                                📚 Ver Catálogo
                            </a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="{{ route('user.reservations') }}" class="btn btn-success w-100">
                                📖 Mis Reservas
                            </a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="#" class="btn btn-secondary w-100">
                                ⚙️ Configuración
                            </a>
                        </div>

                    </div>
                    
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
