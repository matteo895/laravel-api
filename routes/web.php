<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiActivityController;
use App\Http\Controllers\BookingController;

// Rotta per la pagina di benvenuto
Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// Rotta per la dashboard dopo il login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Rotta per visualizzare le attività
Route::get('/activities', [ApiActivityController::class, 'index'])->middleware('auth')->name('activities.index');
Route::resource('bookings', BookingController::class);

// Rotte protette da autenticazione
Route::middleware(['auth'])->group(function () {
    // Rotta per visualizzare le prenotazioni
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    // Rotta per creare una prenotazione
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});

// Rotte generate da Laravel Breeze
require __DIR__ . '/auth.php';
