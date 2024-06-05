@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-5 mt-5 text-center">MODIFICA PRENOTAZIONE</h1>

    <div class="card" style="box-shadow: 6px 4px 4px 10px rgba(0,0,0,0.9); background-color: rgba(0,0,0,0.3);">
        <div class="card-body">
            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Menu a discesa per selezionare l'attività -->
                <div class="form-group text-white">
                    <label for="activity_id" class="mb-4 fs-4 ">ATTIVITÀ</label>
                    <select class="form-control text-white fs-5" id="activity_id" name="activity_id" required style=" background-color: rgba(0,0,0,0.5);">
                        @foreach($activities as $activity)
                        <option value="{{ $activity->id }}" class="text-white fs-5" {{ $booking->activity_id == $activity->id ? 'selected' : '' }}>
                            {{ $activity->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-4 fs-5">SALVA</button>
            </form>
        </div>
    </div>
</div>

@endsection