<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Biblioteca - Reserva de libros')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/wlogo.png') }}">
    <style>
        .book-card {
            transition: transform .2s ease, box-shadow .2s ease;
            cursor: pointer;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
            border-color: #0d6efd;
        }

        .book-cover {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR PÚBLICO -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Mi Biblioteca</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('catalog') }}">Catálogo</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-light text-center py-3 mt-5 border-top">
        <p class="mb-0">© {{ date('Y') }} Mi Biblioteca – Sistema de Reservas</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
