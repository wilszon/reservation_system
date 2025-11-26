<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panel de Usuario')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/wlogo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        {{-- NAVBAR DEL USUARIO --}}
        <nav class="navbar navbar-expand-md shadow-sm user-navbar">
            <div class="container d-flex justify-content-between align-items-center">

                <!-- IZQUIERDA (LOGO) -->
                <a class="navbar-brand fw-bold text-white me-4" href="{{ route('user.dashboard') }}">
                    <i class="bi bi-book-half"></i> BookReserve
                </a>

                <!-- TOGGLER PARA MÓVIL -->
                <button class="navbar-toggler border-0 ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarUser" aria-controls="navbarUser" aria-expanded="false">
                    <i class="bi bi-list text-white fs-1"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarUser">

                    <!-- DERECHA (USUARIO) -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end shadow">
                                <a class="dropdown-item" href="{{ route('user.profile.edit') }}">Mi Perfil</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">Cerrar Sesión</button>
                                </form>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>



        {{-- CONTENIDO --}}
        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/buscarLibros.js') }}"></script>
</body>

</html>
