<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request, $book_id)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'observations' => 'nullable|string|max:255',
        ]);

        Reservation::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'observations' => $request->observations,
            'status' => 'pendiente',
            'reserved_at' => now(),
        ]);

        return redirect()->route('user.reservations')
            ->with('success', 'Reserva enviada. Espera aprobación.');
    }

    public function index()
    {
        $reservations = Reservation::with(['user', 'book'])->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Descontar libro
        $reservation->book->decrement('quantity');

        $reservation->update(['status' => 'aprobada']);

        return back()->with('success', 'Reserva aprobada.');
    }

    public function reject($id)
    {
        Reservation::findOrFail($id)->update(['status' => 'rechazada']);

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
}
