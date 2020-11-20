@extends('layout')

@section('title', 'Create a Time Slot')

@section('content')
    <form action="/277640/time-slots" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Enter the Date of the Time Slot</label>
            <input type="text" class="form-control" name="date">
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
@endsection
