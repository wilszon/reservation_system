@extends('layouts.admin')

@section('content')
    <h2 class="mb-4 section-title-black">
        <i class="bi bi-journal-bookmark-fill"></i> Reservas
    </h2>

    <div class="card shadow-sm mt-4">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped m-0">
                <thead class="my-table-header">
                    <tr>
                        <th>Usuario</th>
                        <th>Libro</th>
                        <th>Fecha de Préstamo</th>
                        <th>Observaciones</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($reservations as $r)
                        <tr>
                            <td>{{ $r->user->name }}</td>

                            <td>{{ $r->book->title }}</td>

                            {{-- Fecha de préstamo --}}
                            <td>{{ \Carbon\Carbon::parse($r->start_date)->format('d/m/Y') }} -
                                {{ \Carbon\Carbon::parse($r->end_date)->format('d/m/Y') }}
                            </td>

                            {{-- Observaciones --}}
                            <td>{{ $r->observations ?? '—' }}</td>

                            {{-- Estado --}}
                            <td>
                                @if ($r->status == 'pendiente')
                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                @elseif ($r->status == 'aprobada')
                                    <span class="badge bg-success">Aprobada</span>
                                @elseif ($r->status == 'devuelta')
                                    <span class="badge bg-primary">Devuelto</span>
                                @else
                                    <span class="badge bg-danger">Rechazada</span>
                                @endif
                            </td>

                            {{-- Acciones --}}
                            <td>

                                @if ($r->status == 'pendiente')
                                    {{-- Botón aprobar --}}
                                    <form action="{{ route('admin.reservations.approve', $r->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button class="btn btn-success btn-sm">
                                            <i class="bi bi-check2-circle"></i> Aprobar
                                        </button>
                                    </form>

                                    {{-- Botón rechazar --}}
                                    <form action="{{ route('admin.reservations.reject', $r->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="bi bi-x-circle"></i> Rechazar
                                        </button>
                                    </form>
                                @endif

                                @if ($r->status == 'aprobada')
                                    {{-- Botón marcar como devuelto --}}
                                    <form action="{{ route('admin.reservations.return', $r->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-primary btn-sm">
                                            <i class="bi bi-arrow-counterclockwise"></i> Marcar devuelto
                                        </button>
                                    </form>
                                @endif

                                @if ($r->status == 'rechazada' || $r->status == 'devuelta')
                                    <em>No disponible</em>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-3">
                                No se encontraron reservas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
