<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'year',
        'category',
        'cover_image',
        'quantity',
    ];


    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }
}
