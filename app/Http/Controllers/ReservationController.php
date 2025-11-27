<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'observations' => 'nullable|string|max:255',
        ]);


        $existing = Reservation::where('user_id', auth()->id())
            ->where('book_id', $request->book_id)
            ->whereIn('status', ['pendiente', 'aprobada'])
            ->first();

        if ($existing) {
            return back()->with('error', 'Ya tienes una reserva activa para este libro.');
        }

        // Crear reserva
        Reservation::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'observations' => $request->observations,
            'status' => 'pendiente',
        ]);

        return redirect()
            ->route('user.reservations.create', $request->book_id)
            ->with('success', 'La reserva se ha enviado correctamente, espere que el administrador la apruebe.');
    }

    public function index()
    {
        $reservations = Reservation::with(['user', 'book'])->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Verificar disponibilidad del libro
        if ($reservation->book->quantity <= 0) {
            return back()->with('error', 'No hay ejemplares disponibles para aprobar esta reserva.');
        }

        // Descontar un ejemplar del libro
        $reservation->book->decrement('quantity');

        // Cambiar estado de la reserva a aprobada
        $reservation->update(['status' => 'aprobada']);

        return back()->with('success', 'Reserva aprobada.');
    }

    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update(['status' => 'rechazada']);

        return back()->with('success', 'Reserva rechazada.');
    }


    public function cancel($book_id)
    {
        $reservation = Reservation::where('user_id', auth()->id())
            ->where('book_id', $book_id)
            ->where('status', 'pendiente')
            ->first();

        if ($reservation) {
            $reservation->delete();
        }

        return back()->with('success', 'Reserva cancelada.');
    }


    public function userReservations()
    {
        $reservations = Reservation::where('user_id', auth()->id())
            ->with('book')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.reservations.index', compact('reservations'));
    }


    public function create($book_id)
    {
        $book = \App\Models\Book::findOrFail($book_id);

        return view('user.reservations.create', compact('book'));
    }

    public function markAsReturned($id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->status !== 'aprobada') {
            return back()->with('error', 'Solo se pueden marcar como devueltas las reservas aprobadas.');
        }

        $reservation->status = 'devuelta';
        $reservation->save();

        // Sumar disponibilidad al libro
        $reservation->book->increment('quantity');

        return back()->with('success', '📘 El libro ha sido marcado como devuelto y la disponibilidad fue actualizada.');
    }
}
