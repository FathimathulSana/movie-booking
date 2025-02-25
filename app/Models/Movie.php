<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'genre',
        'duration',
        'language',
        'thumbnail',
        'theater_id',
        'show_date',
        'show_time',
        'available_seats',
        'ticket_price'
    ];

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
}
