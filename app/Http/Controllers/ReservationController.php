<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request, $book_id)
    {
        Reservation::create([
            'user_id' => auth()->id(),
            'book_id' => $book_id,
            'status' => 'pendiente',
            'reserved_at' => now(),
        ]);

        return back()->with('success', 'Libro reservado. Espera aprobación.');
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
}
