@extends('layouts.app')

@section('content')
<h1>Le tue prenotazioni</h1>
<ul>
    @foreach ($bookings as $booking)
    <li>{{ $booking->activity->name }} - {{ $booking->activity->start_time }} (Prenotato)</li>
    @endforeach
</ul>
@endsection