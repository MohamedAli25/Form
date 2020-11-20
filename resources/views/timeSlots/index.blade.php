@extends('layout')

@section('title', 'Show all Time Slots')

@section('content')
    <h1>All Time Slots</h1>
    <ul class="list-group">
        @foreach ($timeSlots as $timeSlot)
            <li class="list-group-item"><a href="/277640/time-slots/{{ $timeSlot->id }}">{{ $timeSlot->date }}</a></li>
        @endforeach
    </ul>
    <br>
    <a href="/time-slots/create" class="btn-btn-primary">Create</a>
@endsection
