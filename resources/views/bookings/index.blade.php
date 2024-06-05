@extends('layouts.app')

@section('content')

<h1 class="mb-5 mt-5 text-center">Le tue prenotazioni</h1>
<div class="container">
    <ul class="list-unstyled">
        @foreach ($bookings as $booking)
        <li class="mb-4 py-3 border  rounded p-3" style="box-shadow: 8px 8px 4px 10px rgba(0,0,0,0.9);">
            <div class="d-flex flex-column justify-content-between h-100">
                <div class="mt-3 mb-3 fs-3">
                    @if($booking->activity)
                    <strong>{{ $booking->activity->name }}</strong> - {{ $booking->activity->start_time }} (Prenotato)
                    <button class="btn btn-info mx-5 fs-5 " onclick="toggleDetails('{{ $booking->id }}')">Mostra dettagli</button>
                    <div id="details_{{ $booking->id }}" style="display: none;">
                        <p>Data: {{ $booking->activity->date }}</p>
                        <p>Ora: {{ $booking->activity->time }}</p>
                        <p>Descrizione: {{ $booking->activity->description }}</p>
                    </div>
                    @else
                    Attività non trovata
                    @endif
                </div>
                <div class="mt-auto d-flex justify-content-end">
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary mx-1 fs-5">Modifica</a>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-1 fs-5" onclick="return confirm('Sei sicuro di voler cancellare questa prenotazione?')">Cancella</button>
                    </form>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>


<script>
    function toggleDetails(bookingId) {
        var detailsDiv = document.getElementById('details_' + bookingId);
        if (detailsDiv.style.display === 'none') {
            detailsDiv.style.display = 'block';
        } else {
            detailsDiv.style.display = 'none';
        }
    }
</script>

@endsection