<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Movie;
use App\Models\Theater;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('movie', 'theater')->get();
        return view('admin.bookings.index', compact('bookings'));
    }
    
    // Create a new booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'theater_id' => 'required|exists:theaters,id',
            'movie_id' => 'required|exists:movies,id',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email',
            'seat_count' => 'required|integer|min:1',
        ]);

        $theater = Theater::findOrFail($validated['theater_id']);
        $movie = Movie::findOrFail($validated['movie_id']);

        // Check seat availability
        if ($movie->available_seats < $validated['seat_count']) {
            return response()->json(['success' => false, 'message' => 'Not enough seats available'], 400);
        }

        // Calculate total price
        $total_price = $movie->ticket_price * $validated['seat_count'];

        // Create booking
        $booking = Booking::create([
            'theater_id' => $validated['theater_id'],
            'movie_id' => $validated['movie_id'],
            'user_name' => $validated['user_name'],
            'user_email' => $validated['user_email'],
            'seat_count' => $validated['seat_count'],
            'total_ticket_price' => $total_price,
            'status' => 'booked',
        ]);

        // Reduce available seats
        $movie->decrement('available_seats', $validated['seat_count']);

        // Generate PDF Ticket
        $pdf = Pdf::loadView('emails.ticket', ['booking' => $booking, 'movie' => $movie, 'theater' => $theater]);

        // Send Email with Ticket
        Mail::send([], [], function ($message) use ($validated, $pdf) {
            $message->to($validated['user_email'])
                ->subject('Your Movie Ticket')
                ->attachData($pdf->output(), 'ticket.pdf');
        });

        return response()->json(['message' => 'Booking successful! Ticket sent to email.'], 201);
    }

    // Cancel a booking
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status === 'cancelled') {
            return response()->json(['message' => 'Booking is already cancelled.'], 400);
        }

        // Update booking status
        $booking->update(['status' => 'cancelled']);

        // Restore available seats
        $booking->movie->increment('available_seats', $booking->seat_count);

        return response()->json(['message' => 'Booking cancelled successfully.'], 200);
    }
}
