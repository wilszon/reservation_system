@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="col-md-7">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header text-center bg-success text-white rounded-top-4">
                <h4 class="m-0">Crear Cuenta</h4>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text"
                                class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                name="first_name" value="{{ old('first_name') }}" required>

                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text"
                                class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                name="last_name" value="{{ old('last_name') }}" required>

                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required>

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text"
                            class="form-control form-control-lg @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone') }}">

                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            name="password" required>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirmar contraseña</label>
                        <input type="password"
                            class="form-control form-control-lg"
                            name="password_confirmation" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-lg">
                            Registrarse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
