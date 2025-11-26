@extends('layouts.user')

@section('title', 'Editar Perfil')

@section('content')
    <div class="container d-flex align-items-center justify-content-center py-5" style="min-height: 80vh;">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-white text-center fw-bold"
                    style="background: linear-gradient(135deg, #4b0e84, #78155d);">
                    Editar Perfil
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('user.profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">Nombre</label>
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name', auth()->user()->first_name) }}" required>

                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">Apellido</label>
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name', auth()->user()->last_name) }}" required>

                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', auth()->user()->email) }}" required>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone', auth()->user()->phone) }}">

                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Opcional: cambiar contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva contraseña (opcional)</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-gradient btn-lg w-100">
                                Actualizar Perfil
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
