<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Biblioteca - Reserva de libros')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="{{ asset('images/wlogo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
</head>

<body>

    <!-- NAVBAR PÚBLICO -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm navbar-guest">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="bi bi-book pe-1"></i>
                BookReserve
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="btn btn-dark fw-bold text-white rounded-2 ms-2" href="{{ route('catalog') }}">Catálogo</a></li>
                    <li class="nav-item"><a class="btn btn-outline-dark fw-bold rounded-2 login-btn ms-2"href="{{ route('login') }}">Iniciar Sesión</a></li>
                    <li class="nav-item"><a class="btn btn-dark fw-bold text-white rounded-2 ms-2" href="{{ route('register') }}">Registrarse</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-light text-center py-3 mt-5 border-top footer-gradient">
        <p class="mb-0">© {{ date('Y') }} BookReserve – Desarrollado por Wilson Suarez</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
