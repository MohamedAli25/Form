@extends('layout')

@section('title', 'Edit a Committee')

@section('css')
    <link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')
    <form action="/277640/available-numbers/updateAll/{{ $committee->id }}" method="post">
        @csrf
        @method("PATCH")
        <h2>Enter the available number of interviewers in each time slot ( {{ $committee->name }} )</h2>
        <div class="row">
            @foreach ($available_numbers as $available_number)
                <div class="form-group col-md-6 col-lg-4">
                    <label for="{{ $available_number->id }}">{{ $available_number->timeSlot->date }}</label>
                    <input type="text" class="form-control" value="{{ $available_number->available_number }}" name="{{ $available_number->id }}">
                </div>
            @endforeach
        </div>
        <br>
        <input type="submit" value="Edit All" class="btn btn-light">
    </form>
@endsection
