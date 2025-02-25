<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('theater')->latest()->get();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        $theaters = Theater::all();
        return view('admin.movies.create', compact('theaters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'language' => 'required|string|max:50',
            'thumbnail' => 'nullable|image',
            'theater_id' => 'required|exists:theaters,id',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'available_seats' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0'
        ]);


        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            $thumbnailPath = null;
        }

        Movie::create(array_merge($request->all(), ['thumbnail' => $thumbnailPath]));


        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
    }

    public function edit(Movie $movie)
    {
        $theaters = Theater::all();
        return view('admin.movies.edit', compact('movie', 'theaters'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'language' => 'required|string|max:50',
            'thumbnail' => 'nullable|image',
            'theater_id' => 'required|exists:theaters,id',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'available_seats' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0'
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            $thumbnailPath = null;
        }

        $movie->update(array_merge($request->all(), ['thumbnail' => $thumbnailPath]));

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}
