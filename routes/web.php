<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TheaterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/theaters', [TheaterController::class, 'index'])->name('theaters.index');
    Route::get('/admin/theaters/create', [TheaterController::class, 'create'])->name('theaters.create');
    Route::post('/admin/theaters', [TheaterController::class, 'store'])->name('theaters.store');
    Route::get('/admin/theaters/edit/{theater}', [TheaterController::class, 'edit'])->name('theaters.edit');
    Route::put('/admin/theaters/{theater}', [TheaterController::class, 'update'])->name('theaters.update');
    Route::delete('/admin/theaters/{theater}', [TheaterController::class, 'destroy'])->name('theaters.destroy');

    Route::get('/admin/movies', [MovieController::class, 'index'])->name('movies.index');
    Route::get('/admin/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/admin/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/admin/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/admin/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/admin/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('bookings.index');
});
require __DIR__.'/auth.php';
