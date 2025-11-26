<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
