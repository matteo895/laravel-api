<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // Metodo per visualizzare le prenotazioni
    public function index()
    {
        // Recupera tutte le prenotazioni dal modello Booking
        $bookings = Booking::all();

        // Restituisci la vista 'bookings.index' passando le prenotazioni recuperate
        return view('bookings.index', compact('bookings'));
    }
}
