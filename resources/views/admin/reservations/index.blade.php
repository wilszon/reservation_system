@extends('layouts.admin')
@section('content')
<h2>Reservas</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Libro</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($reservations as $r)
        <tr>
            <td>{{ $r->user->name }}</td>
            <td>{{ $r->book->title }}</td>
            <td>{{ $r->status }}</td>
            <td>
                @if ($r->status == 'pendiente')
                <form action="{{ route('admin.reservations.approve', $r->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-success btn-sm">Aprobar</button>
                </form>

                <form action="{{ route('admin.reservations.reject', $r->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-danger btn-sm">Rechazar</button>
                </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
