<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                <table class="min-w-full bg-white mt-4 border">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border">No.</th>
                            <th class="py-2 px-4 border">User</th>
                            <th class="py-2 px-4 border">Movie</th>
                            <th class="py-2 px-4 border">Theater</th>
                            <th class="py-2 px-4 border">Seats</th>
                            <th class="py-2 px-4 border">Total Price</th>
                            <th class="py-2 px-4 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border">{{ $booking->user_name }}</td>
                            <td class="py-2 px-4 border">{{ $booking->movie->title }}</td>
                            <td class="py-2 px-4 border">{{ $booking->theater->name }}</td>
                            <td class="py-2 px-4 border">{{ $booking->seat_count }}</td>
                            <td class="py-2 px-4 border">₹{{ $booking->total_ticket_price }}</td>
                            <td class="py-2 px-4 border">{{ ucfirst($booking->status) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</x-app-layout>
