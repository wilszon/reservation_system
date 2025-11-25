<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'status',
        'reserved_at',
    ];

    // RELACIÓN: Una reserva pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // RELACIÓN: Una reserva pertenece a un libro
    public function book()
    {
        return $this->belongsTo(\App\Models\Book::class);
    }
}
