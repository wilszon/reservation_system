<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panel de Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/wlogo.png') }}">
</head>

<body>
    <div id="app">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2 sidebar">
                    <div class="sidebar-title">
                        <h2 class="m-0">Panel Admin</h2>
                        <small>BookReserve</small>
                    </div>

                    <div>
                        <a href="{{ route('admin.reservations.index') }}">
                            <i class="bi bi-clipboard2-data"></i>
                            <p>Solicitudes</p>
                        </a>

                        <a href="{{ route('admin.books.index') }}">
                            <i class="bi bi-book"></i>
                            <p>Mis Libros</p>
                        </a>

                        <a href="{{ route('admin.books.create') }}">
                            <i class="bi bi-upload"></i>
                            <p>Subir Libro</p>
                        </a>

                        <a href="{{ route('admin.clients') }}">
                            <i class="bi bi-people-fill"></i>
                            <p>Clientes</p>
                        </a>
                    </div>

                    <div class="logout-btn text-center">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-light w-100">
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>

                </div>

                <div class="col-sm-10 p-4">
                    @yield('content')
                </div>

            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/buscarUser.js') }}"></script>

</body>

</html>
</body>

</html>
