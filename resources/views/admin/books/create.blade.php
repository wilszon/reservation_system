@extends('layouts.admin')

@section('title', 'Agregar Libro')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">➕ Agregar Libro</h2>
            <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">⬅ Volver</a>
        </div>

        {{-- Mensajes globales --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow-sm mx-auto" style="max-width: 900px;">
            <div class="card-body p-4">

                <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        {{-- Título --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Título</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Autor --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Autor</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
                            @error('author')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Año --}}
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Año</label>
                            <input type="number" name="year" class="form-control" value="{{ old('year') }}" required>
                            @error('year')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Categoría --}}
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Categoría</label>
                            <select name="category" class="form-select" required>
                                <option value="" disabled {{ old('category') ? '' : 'selected' }}>Seleccione una categoría</option>
                                @php
                                    $categories = [
                                        'Ficción',
                                        'No Ficción',
                                        'Ciencia Ficción',
                                        'Historia',
                                        'Infantil',
                                        'Juvenil',
                                        'Biografía',
                                        'Novela',
                                        'Cuento',
                                        'General',
                                    ];
                                @endphp
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                                        {{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Descripción --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">Descripción</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Portada (opcional) --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Portada</label>
                            <input type="file" name="cover_image" class="form-control">
                            @error('cover_image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Cantidad --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Cantidad disponible</label>
                            <input type="number" name="quantity" min="0" value="{{ old('quantity', 0) }}" class="form-control" required>
                            @error('quantity')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
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
