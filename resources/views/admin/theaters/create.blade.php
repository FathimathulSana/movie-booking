<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Theater') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('theaters.store') }}" method="POST">
                @csrf
                <label class="block mb-2 text-white">Name:</label>
                <input type="text" name="name" class="w-full border p-2 mb-4">

                <label class="block mb-2 text-white">Location:</label>
                <input type="text" name="location" class="w-full border p-2 mb-4">

                <label class="block mb-2 text-white">Total Seats:</label>
                <input type="number" name="total_seats" class="w-full border p-2 mb-4">

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
            </form>
        </div>
    </div>
</x-app-layout>
