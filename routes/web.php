<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BookingController;

// Rotta per la pagina di benvenuto
Route::get('/', function () {
    return view('welcome');
});

// Rotta per visualizzare le attività
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');

// Rotte protette da autenticazione
Route::middleware(['auth'])->group(function () {
    // Rotta per visualizzare le prenotazioni
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

    // Rotta per creare una prenotazione
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});
