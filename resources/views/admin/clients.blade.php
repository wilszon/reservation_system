@extends('layouts.admin')

@section('title', 'Usuarios Registrados')

@section('content')
<div class="container">

    <h2 class="mb-4 fw-bold"><i class="bi bi-people-fill"></i> Usuarios Registrados</h1>

    <!-- Buscador -->
    <form method="GET" action="{{ route('admin.clients') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" id="searchInput" class="form-control"
                   placeholder="Buscar usuario por nombre o email..."
                   value="{{ $search }}">
            <button class="btn btn-gradient"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <div class="card-header bg-primary text-white">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped m-0">
                <thead class="my-table-header">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Fecha Registro</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">No se encontraron usuarios.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>

</div>
@endsection
