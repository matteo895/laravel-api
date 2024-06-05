@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <h1 class="mt-5 mb-5 text-center">ATTIVITÀ DISPONIBILI</h1>
        @foreach ($activities as $activity)
        <div class="col-3 mt-5">
            <div class="card h-100" style="max-width: 18rem; box-shadow: 6px 4px 4px 10px rgba(0,0,0,0.9);">
                <img src="{{ asset('pictures/' . $activity->image) }}" class="card-img-top" style="height: 150px; object-fit:cover;" alt="{{ $activity->name }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $activity->name }}</h5>
                    <p class="card-text">{{ $activity->description }}</p>
                    <form action="{{ route('bookings.store') }}" method="POST" id="booking-form" class="mt-auto">
                        <p class="card-text"><small class="text-muted">{{ $activity->date }} - {{ $activity->time }}</small></p>

                        @csrf
                        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                        <button type="submit" class="btn btn-primary ">Prenota</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection