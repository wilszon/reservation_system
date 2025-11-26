@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-5">
        <div class="card login-card shadow-lg p-0">

            <!-- Header con gradiente igual al login -->
            <div class="card-header login-header text-white text-center rounded-top-4 py-3">
                <h4 class="m-0 fw-bold">Crear Cuenta</h4>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label text-purple-soft">Nombre</label>
                            <input id="first_name" type="text"
                                class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                name="first_name" value="{{ old('first_name') }}" required>

                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label text-purple-soft">Apellido</label>
                            <input id="last_name" type="text"
                                class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                name="last_name" value="{{ old('last_name') }}" required>

                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-purple-soft">Correo electrónico</label>
                        <input id="email" type="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required>

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label text-purple-soft">Teléfono</label>
                        <input id="phone" type="text"
                            class="form-control form-control-lg @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone') }}">

                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-purple-soft">Contraseña</label>
                        <input id="password" type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            name="password" required>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label text-purple-soft">Confirmar contraseña</label>
                        <input id="password_confirmation" type="password"
                            class="form-control form-control-lg"
                            name="password_confirmation" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-gradient btn-lg text-white">
                            Registrarse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
