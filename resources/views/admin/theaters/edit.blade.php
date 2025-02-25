<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Theater') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('theaters.update', $theater) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="block mb-2 text-white">Name:</label>
                <input type="text" name="name" value="{{ old('name', $theater->name) }}"
                    class="w-full border p-2 mb-4">

                <label class="block mb-2 text-white">Location:</label>
                <input type="text" name="location" value="{{ old('location', $theater->location) }}"
                    class="w-full border p-2 mb-4">

                <label class="block mb-2 text-white">Total Seats:</label>
                <input type="number" name="total_seats" value="{{ old('total_seats', $theater->total_seats) }}"
                    class="w-full border p-2 mb-4">

                <a href="{{ route('theaters.index') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Cancel</a>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
            </form>
        </div>
    </div>
</x-app-layout>
