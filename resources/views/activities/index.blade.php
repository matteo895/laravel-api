@extends('layouts.app')

@section('content')
<h1>Attività</h1>
<ul>
    @foreach ($activities as $activity)
    <li>{{ $activity->name }} - {{ $activity->description }} ({{ $activity->start_time }} - {{ $activity->end_time }})</li>
    @endforeach
</ul>
@endsection