@extends('layouts.admin')

@section('title', 'Editar Libro')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">✏️ Editar Libro</h1>
        <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">⬅ Volver</a>
    </div>

    <div class="card shadow-sm mx-auto" style="max-width: 900px;">
        <div class="card-body p-4">

            <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Título --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Título</label>
                        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                    </div>

                    {{-- Autor --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Autor</label>
                        <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
                    </div>

                    {{-- Año --}}
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Año</label>
                        <input type="number" name="year" class="form-control" value="{{ $book->year }}">
                    </div>

                    {{-- Categoría --}}
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Categoría</label>
                        <input type="text" name="category" class="form-control" value="{{ $book->category }}">
                    </div>

                    {{-- Descripción --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">Descripción</label>
                        <textarea name="description" class="form-control" rows="3">{{ $book->description }}</textarea>
                    </div>

                    {{-- Portada --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Portada (opcional)</label>
                        <input type="file" name="cover_image" class="form-control">
                    </div>

                    {{-- Cantidad --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Cantidad disponible</label>
                        <input type="number" name="quantity" min="1" value="{{ $book->quantity }}" class="form-control">
                    </div>

                </div>

                <div class="mt-4 text-end">
                    <button class="btn btn-primary px-4">Actualizar</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
