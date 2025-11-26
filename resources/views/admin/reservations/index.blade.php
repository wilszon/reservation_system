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
                    </tr>
                </thead>

                <tbody>
                    @forelse ($reservations as $r)
                        <tr>
                            <td>{{ $r->user->name }}</td>

                            <td>{{ $r->book->title }}</td>

                            {{-- Fecha de préstamo --}}
                            <td>
                                {{ $r->reserved_at ? \Carbon\Carbon::parse($r->reserved_at)->format('d/m/Y') : $r->created_at->format('d/m/Y') }}
                            </td>

                            {{-- Observaciones (NO EXISTE EN EL MODELO, así que queda vacío) --}}
                            <td>—</td>

                            {{-- Estado --}}
                            <td>
                                @if ($r->status == 'pendiente')
                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                @elseif ($r->status == 'aprobada')
                                    <span class="badge bg-success">Aprobada</span>
                                @else
                                    <span class="badge bg-danger">Rechazada</span>
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
