@extends('layouts.admin')

@section('title', 'Editar Libro')

@section('content')
<div class="container">

    <h1 class="mb-4">✏️ Editar Libro</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Título --}}
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                </div>

                {{-- Autor --}}
                <div class="mb-3">
                    <label class="form-label">Autor</label>
                    <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
                </div>

                {{-- Año --}}
                <div class="mb-3">
                    <label class="form-label">Año</label>
                    <input type="number" name="year" class="form-control" value="{{ $book->year }}">
                </div>

                {{-- Categoría --}}
                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <input type="text" name="category" class="form-control" value="{{ $book->category }}">
                </div>

                {{-- Descripción --}}
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="description" class="form-control">{{ $book->description }}</textarea>
                </div>

                {{-- Imagen actual --}}
                @if ($book->cover_image)
                    <p><strong>Portada actual:</strong></p>
                    <img src="{{ asset('storage/'.$book->cover_image) }}" width="120" class="mb-3 rounded">
                @endif

                {{-- Nueva imagen --}}
                <div class="mb-3">
                    <label class="form-label">Cambiar portada</label>
                    <input type="file" name="cover_image" class="form-control">
                </div>

                {{-- Cantidad --}}
                <div class="mb-3">
                    <label class="form-label">Cantidad</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $book->quantity }}">
                </div>

                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>
</div>
@endsection
