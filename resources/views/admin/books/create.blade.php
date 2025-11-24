@extends('layouts.admin')

@section('title', 'Agregar Libro')

@section('content')
<div class="container">
    <h1 class="mb-4">➕ Agregar Libro</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Título --}}
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                {{-- Autor --}}
                <div class="mb-3">
                    <label class="form-label">Autor</label>
                    <input type="text" name="author" class="form-control" required>
                </div>

                {{-- Año --}}
                <div class="mb-3">
                    <label class="form-label">Año</label>
                    <input type="number" name="year" class="form-control">
                </div>

                {{-- Categoría --}}
                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <input type="text" name="category" class="form-control">
                </div>

                {{-- Descripción --}}
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                {{-- Portada --}}
                <div class="mb-3">
                    <label class="form-label">Portada</label>
                    <input type="file" name="cover_image" class="form-control">
                </div>

                {{-- Cantidad --}}
                <div class="mb-3">
                    <label class="form-label">Cantidad disponible</label>
                    <input type="number" name="quantity" min="1" value="1" class="form-control">
                </div>

                <button class="btn btn-success">Guardar</button>
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>
</div>
@endsection
