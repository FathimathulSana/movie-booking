<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'theater_id',
        'seat_count',
        'status',
        'user_name',
        'user_email',
        'total_ticket_price'
    ];

    public function theater() {
        return $this->belongsTo(Theater::class);
    }
    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
