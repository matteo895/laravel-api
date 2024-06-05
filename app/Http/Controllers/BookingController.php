<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Activity;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    // Metodo per visualizzare le prenotazioni
    public function index()
    {
        // Recupera tutte le prenotazioni dal modello Booking con le relative attività
        $bookings = Booking::with('activity')->get();

        // Log delle prenotazioni recuperate
        Log::info('Bookings retrieved: ', $bookings->toArray());

        // Restituisci la vista 'bookings.index' passando le prenotazioni recuperate
        return view('bookings.index', compact('bookings'));
    }

    // Metodo per creare una nuova prenotazione
    public function store(Request $request)
    {
        // Log dei dati ricevuti dalla richiesta
        Log::info('Request Data: ', $request->all());

        // Validazione dei dati inviati dal form
        $validatedData = $request->validate([
            'activity_id' => 'required|exists:activities,id',
        ]);

        // Log dei dati validati
        Log::info('Validated Data: ', $validatedData);

        // Aggiungi l'user_id alla richiesta
        $validatedData['user_id'] = auth()->id();

        // Creazione di una nuova prenotazione utilizzando i dati validati
        $booking = Booking::create($validatedData);

        // Log della prenotazione creata
        Log::info('Booking Created: ', $booking->toArray());

        // Redirect alla pagina di visualizzazione delle prenotazioni
        return redirect()->route('bookings.index');
    }

    // Metodo per visualizzare il modulo di modifica di una prenotazione
    public function edit($id)
    {
        // Recupera la prenotazione dal modello Booking tramite l'ID
        $booking = Booking::findOrFail($id);
        $activities = Activity::all();
        // Restituisci la vista 'bookings.edit' passando la prenotazione da modificare
        return view('bookings.edit', compact('booking', 'activities'));
    }

    // Metodo per aggiornare una prenotazione esistente
    public function update(Request $request, $id)
    {
        // Validazione dei dati inviati dal form
        $validatedData = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            // Specifica le regole di validazione per i dati del form
        ]);

        // Recupera la prenotazione dal modello Booking tramite l'ID
        $booking = Booking::findOrFail($id);

        // Aggiornamento della prenotazione utilizzando i dati validati
        $booking->update($validatedData);

        // Redirect alla pagina di visualizzazione delle prenotazioni
        return redirect()->route('bookings.index');
    }

    // Metodo per eliminare una prenotazione esistente
    public function destroy($id)
    {
        // Recupera la prenotazione dal modello Booking tramite l'ID e elimina
        $booking = Booking::findOrFail($id);
        $booking->delete();

        // Redirect alla pagina di visualizzazione delle prenotazioni
        return redirect()->route('bookings.index');
    }
}
