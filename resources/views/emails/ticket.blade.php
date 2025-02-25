<!DOCTYPE html>
<html>
<head>
    <title>Movie Ticket</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .ticket { border: 2px solid black; padding: 20px; display: inline-block; margin-top: 50px; }
    </style>
</head>
<body>
    <div class="ticket">
        <h2>{{ $theater->name }}</h2> - <h2>{{ $movie->title }}</h2>
        <p><strong>Name:</strong> {{ $booking->user_name }}</p>
        <p><strong>Email:</strong> {{ $booking->user_email }}</p>
        <p><strong>Seats:</strong> {{ $booking->seat_count }}</p>
        <p><strong>Show Date:</strong> {{ $movie->show_date }}</p>
        <p><strong>Show Time:</strong> {{ $movie->show_time }}</p>
        <p><strong>Total Price:</strong> ₹{{ $booking->total_ticket_price }}</p>
        <p>Status: {{ ucfirst($booking->status) }}</p>
        <p>Enjoy your movie! 🍿🎬</p>
    </div>
</body>
</html>
