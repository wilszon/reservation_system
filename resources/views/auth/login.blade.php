@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-5">

        <div class="card login-card shadow-lg p-0">
            
            <div class="card-header login-header text-white text-center rounded-top-4 py-3">
                <h4 class="m-0 fw-bold">Iniciar Sesión</h4>
            </div>

            <div class="card-body p-4">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label text-purple-soft">Correo electrónico</label>
                        <input id="email" type="email" 
                            class="form-control form-control-lg @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autofocus>
                        
                        @error('email')
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

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-gradient btn-lg text-white">
                            Entrar
                        </button>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-center mt-2 text-light text-decoration-none">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
