<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $theatersCount = Theater::count();
        $moviesCount = Movie::count();
        $bookingsCount = Booking::count();

        return view('dashboard', compact('theatersCount', 'moviesCount', 'bookingsCount'));
    }

}
