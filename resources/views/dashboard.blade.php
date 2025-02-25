<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Theaters Card -->
                <a href="{{ route('theaters.index') }}" class="block">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Theaters</h3>
                    <p class="text-3xl font-bold text-blue-500">{{ $theatersCount }}</p>
                </div>
                </a>

                <!-- Movies Card -->
                <a href="{{ route('movies.index') }}" class="block">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Movies</h3>
                    <p class="text-3xl font-bold text-green-500">{{ $moviesCount }}</p>
                </div>
                </a>

                <!-- Bookings Card -->
                <a href="{{ route('bookings.index') }}" class="block">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Bookings</h3>
                    <p class="text-3xl font-bold text-red-500">{{ $bookingsCount }}</p>
                </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
