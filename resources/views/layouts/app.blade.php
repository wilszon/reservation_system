<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <div id="app">
        {{-- NAVBAR PRINCIPAL --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
            <div class="container py-2">

                {{-- Logo / Nombre --}}
                <a class="navbar-brand fw-bold fs-4 d-flex align-items-center" href="{{ url('/') }}">
                    <i class="bi bi-book-half me-2"></i>
                    Librería
                </a>

                {{-- Toggle mobile --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Contenido --}}
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto align-items-center gap-2">

                        @guest
                            <li class="nav-item">
                                <a class="btn btn-light px-3" href="{{ route('login') }}">
                                    Iniciar Sesión
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-light px-3" href="{{ route('register') }}">
                                    Registrarse
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fw-semibold"
                                    href="#" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow">
                                    <a class="dropdown-item" href="#">
                                        Mi Perfil
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>

                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-dark text-center text-white py-3 mt-5">
            <div class="container">
                <p class="mb-1">Librería — Todos los derechos reservados © 2025</p>
                <small class="text-muted">Wilson Andres Suarez Mantilla</small>
            </div>
        </footer>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
