<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function index()
    {
        $theaters = Theater::all();
        return view('admin.theaters.index', compact('theaters'));
    }

    public function create()
    {
        return view('admin.theaters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'total_seats' => 'required|integer|min:1'
        ]);

        Theater::create($request->all());
        return redirect()->route('theaters.index')->with('success', 'Theater added successfully.');
    }

    public function edit(Theater $theater)
    {
        return view('admin.theaters.edit', compact('theater'));
    }

    public function update(Request $request, Theater $theater)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'total_seats' => 'required|integer|min:1'
        ]);

        $theater->update($request->all());
        return redirect()->route('theaters.index')->with('success', 'Theater updated successfully.');
    }

    public function destroy(Theater $theater)
    {
        $theater->delete();
        return redirect()->route('theaters.index')->with('success', 'Theater deleted successfully.');
    }
}
