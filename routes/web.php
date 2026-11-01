<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PerformerInfoController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Public event browsing
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Admin-only event management
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

    Route::post('/events', [EventController::class, 'store'])->name('events.store');

    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');

    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

    Route::patch('/events/{event}', [EventController::class, 'update'])->name('events.update');

    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

// Public event details — keep this below the create route
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// Public performer browsing
Route::get('/performers', [PerformerInfoController::class, 'index'])->name('performers.index');


// Admin-only performer management
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/performers/create', [PerformerInfoController::class, 'create'])->name('performers.create');

    Route::post('/performers', [PerformerInfoController::class, 'store'])->name('performers.store');

    Route::get('/performers/{performer}/edit', [PerformerInfoController::class, 'edit'])->name('performers.edit');

    Route::put('/performers/{performer}', [PerformerInfoController::class, 'update'])->name('performers.update');

    Route::patch('/performers/{performer}', [PerformerInfoController::class, 'update']);

    Route::delete('/performers/{performer}', [PerformerInfoController::class, 'destroy'])->name('performers.destroy');
});

// Keep this show route after the create route
Route::get('/performers/{performer}', [PerformerInfoController::class, 'show'])->name('performers.show');


Route::middleware('auth')->group(function () {
    // View user's bookings
    Route::get('/bookings', [BookingController::class, 'index'])
        ->name('bookings.index');

    // Display booking form
    Route::get('/bookings/create', [BookingController::class, 'create'])
        ->name('bookings.create');

    // Save new booking
    Route::post('/bookings', [BookingController::class, 'store'])
        ->name('bookings.store');

    // Display edit booking form
    Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])
        ->name('bookings.edit');

    // Update booking
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])
        ->name('bookings.update');

    // Delete booking
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])
        ->name('bookings.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
