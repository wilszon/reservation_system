@extends('layouts.user')
@section('title', 'Mis Reservas')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('user.dashboard') }}" class="btn btn-gradient btn-circle">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>


        <h2 class="mb-3">📚 Mis Reservas</h2>

        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Libro</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($reservations as $res)
                    <tr>
                        <td>{{ $res->book->title }}</td>
                        <td>{{ $res->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @if ($res->status == 'pendiente')
                                <span class="badge bg-warning">Pendiente</span>
                            @elseif($res->status == 'aprobada')
                                <span class="badge bg-success">Aprobada</span>
                            @else
                                <span class="badge bg-danger">Rechazada</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
