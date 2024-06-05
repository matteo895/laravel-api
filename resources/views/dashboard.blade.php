@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white" style="box-shadow: 6px 4px 4px 10px rgba(0,0,0,0.9); background-color: rgba(0,0,0,0.3);">
                <div class="card-header fs-3">BENVENUTO</div>

                <div class="card-body fs-4">
                    Da qui potrai visitare il fantastico mondo delle <a href="{{ route('activities.index') }}" class="text-decoration-none">ATTIVITÀ</a> che abbiamo di recente e le <a href="{{ route('bookings.index') }}" class="text-decoration-none">PRENOTAZIONI</a> attive
                </div>
            </div>
        </div>
    </div>
</div>

@endsection