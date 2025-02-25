<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Movie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <label for="title" class="block font-bold">Title</label>
                <input type="text" name="title" value="{{ $movie->title }}" required class="w-full border p-2 mb-4">

                {{-- Description --}}
                <label for="description" class="block font-bold">Description</label>
                <textarea name="description" required class="w-full border p-2 mb-4">{{ $movie->description }}</textarea>

                {{-- Genre --}}
                <label for="genre" class="block font-bold">Genre</label>
                <input type="text" name="genre" value="{{ $movie->genre }}" required class="w-full border p-2 mb-4">

                {{-- Duration --}}
                <label for="duration" class="block font-bold">Duration (Minutes)</label>
                <input type="number" name="duration" value="{{ $movie->duration }}" required class="w-full border p-2 mb-4">

                {{-- Language --}}
                <label for="language" class="block font-bold">Language</label>
                <input type="text" name="language" value="{{ $movie->language }}" required class="w-full border p-2 mb-4">

                {{-- Thumbnail --}}
                <label for="thumbnail" class="block font-bold">Thumbnail</label>
                <input type="file" name="thumbnail" class="w-full border p-2 mb-4">
                @if($movie->thumbnail)
                    <img src="{{ asset('storage/' . $movie->thumbnail) }}" alt="Thumbnail" class="w-40 h-40 mb-4">
                @endif

                {{-- Theater --}}
                <label for="theater_id" class="block font-bold">Theater</label>
                <select name="theater_id" required class="w-full border p-2 mb-4">
                    <option value="">Select Theater</option>
                    @foreach ($theaters as $theater)
                        <option value="{{ $theater->id }}" {{ $movie->theater_id == $theater->id ? 'selected' : '' }}>
                            {{ $theater->name }}
                        </option>
                    @endforeach
                </select>

                {{-- Show Date --}}
                <label for="show_date" class="block font-bold">Show Date</label>
                <input type="date" name="show_date" value="{{ $movie->show_date }}" required class="w-full border p-2 mb-4">

                {{-- Show Time --}}
                <label for="show_time" class="block font-bold">Show Time</label>
                <input type="time" name="show_time" value="{{ $movie->show_time }}" required class="w-full border p-2 mb-4">

                {{-- Available Seats --}}
                <label for="available_seats" class="block font-bold">Available Seats</label>
                <input type="number" name="available_seats" value="{{ $movie->available_seats }}" required class="w-full border p-2 mb-4">

                {{-- Ticket Price --}}
                <label for="ticket_price" class="block font-bold">Ticket Price (₹)</label>
                <input type="number" name="ticket_price" value="{{ $movie->ticket_price }}" required class="w-full border p-2 mb-4">

                {{-- Buttons --}}
                <a href="{{ route('movies.index') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Cancel</a>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Movie</button>
            </form>
        </div>
    </div>
</x-app-layout>
