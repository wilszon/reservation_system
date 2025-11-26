@extends('layouts.admin')

@section('title', 'Agregar Libro')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">➕ Agregar Libro</h1>
            <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">⬅ Volver</a>
        </div>

        <div class="card shadow-sm mx-auto" style="max-width: 900px;">
            <div class="card-body p-4">

                <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        {{-- Título --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Título</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        {{-- Autor --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Autor</label>
                            <input type="text" name="author" class="form-control" required>
                        </div>

                        {{-- Año --}}
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Año</label>
                            <input type="number" name="year" class="form-control">
                        </div>

                        {{-- Categoría --}}
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Categoría</label>
                            <select name="category" class="form-select" required>
                                <option value="" disabled selected>Seleccione una categoría</option>
                                @php
                                    $categories = [
                                        'Ficción', // Novela, cuento, literatura general
                                        'No Ficción', // Ensayos, divulgación
                                        'Ciencia Ficción', // Sci-Fi y fantasía
                                        'Historia', // Historia y hechos reales
                                        'Infantil', // Libros para niños
                                        'Juvenil', // Young Adult / adolescentes
                                        'Biografía', // Biografías y memorias
                                        'Novela', // Novelas clásicas o modernas
                                        'Cuento', // Cuentos cortos
                                        'General', // Para lo que no encaje en otra categoría
                                    ];
                                @endphp
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat }}">{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Descripción --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">Descripción</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        {{-- Portada --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Portada</label>
                            <input type="file" name="cover_image" class="form-control">
                        </div>

                        {{-- Cantidad --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Cantidad disponible</label>
                            <input type="number" name="quantity" min="1" value="1" class="form-control">
                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <button class="btn btn-success px-4">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
