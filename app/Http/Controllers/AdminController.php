<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Contadores para las cards
        $totalBooks = Book::count();
        $totalUsers = User::count();
        $pendingReservations = Reservation::where('status', 'pendiente')->count();
        $approvedReservations = Reservation::where('status', 'devuelta')->count();

        // Últimas reservas (5 más recientes)
        $latestReservations = Reservation::with('user', 'book')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Últimos usuarios registrados (5 más recientes)
        $latestUsers = User::where('role', 'user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalUsers',
            'pendingReservations',
            'approvedReservations',
            'latestReservations',
            'latestUsers'
        ));
    }
}
