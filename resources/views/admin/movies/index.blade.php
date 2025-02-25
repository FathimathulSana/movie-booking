<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('movies.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Movie</a>
            <table class="min-w-full bg-white mt-4 border">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">No.</th>
                        <th class="py-2 px-4 border">Thumbnail</th>
                        <th class="py-2 px-4 border">Title</th>
                        <th class="py-2 px-4 border">Genre</th>
                        <th class="py-2 px-4 border">Theater</th>
                        <th class="py-2 px-4 border">Show Date</th>
                        <th class="py-2 px-4 border">Show Time</th>
                        <th class="py-2 px-4 border">Seats</th>
                        <th class="py-2 px-4 border">Price</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                            <td class="border p-2">
                                @if($movie->thumbnail)
                                    <img src="{{ asset('storage/' . $movie->thumbnail) }}" alt="Thumbnail" class="w-20 h-20 object-cover rounded">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border">{{ $movie->title }}</td>
                            <td class="py-2 px-4 border">{{ $movie->genre }}</td>
                            <td class="py-2 px-4 border">{{ $movie->theater->name }}</td>
                            <td class="py-2 px-4 border">{{ $movie->show_date }}</td>
                            <td class="py-2 px-4 border">{{ $movie->show_time }}</td>
                            <td class="py-2 px-4 border">{{ $movie->available_seats }}</td>
                            <td class="py-2 px-4 border">₹{{ $movie->ticket_price }}</td>
                            <td class="py-2 px-4 border">
                                <a href="{{ route('movies.edit', $movie) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

