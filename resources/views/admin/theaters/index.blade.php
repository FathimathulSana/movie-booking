<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Theaters') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('theaters.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Theater</a>
            <table class="min-w-full bg-white mt-4 border">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">No.</th>
                        <th class="py-2 px-4 border">Name</th>
                        <th class="py-2 px-4 border">Location</th>
                        <th class="py-2 px-4 border">Total Seats</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($theaters as $theater)
                        <tr>
                            <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border">{{ $theater->name }}</td>
                            <td class="py-2 px-4 border">{{ $theater->location }}</td>
                            <td class="py-2 px-4 border">{{ $theater->total_seats }}</td>
                            <td class="py-2 px-4 border">
                                <a href="{{ route('theaters.edit', $theater) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('theaters.destroy', $theater) }}" method="POST" class="inline">
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
