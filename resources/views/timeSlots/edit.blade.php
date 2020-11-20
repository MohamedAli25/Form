@extends('layout')

@section('title', 'Edit a Time Slot')

@section('content')
    <form action="/277640/time-slots/{{ $timeSlot->id }}" method="post">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="name">Enter the Date of the Time Slot</label>
            <input type="text" class="form-control" value="{{ $timeSlot->name }}" name="date">
            <br>
            <input type="submit" value="Edit" class="btn btn-primary">
        </div>
    </form>
    <br>
    <form action="/277640/time-slots/{{ $timeSlot->id }}" method="post">
        @csrf
        @method("DELETE")
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
@endsection