@extends('layout')

@section('title', 'Show all Committees')

@section('content')
    <h1>All Committees</h1>
    <ul class="list-group">
        @foreach ($committees as $committee)
            <li class="list-group-item"><a href="/277640/available-numbers/editAll/{{ $committee->id }}">{{ $committee->name }}</a></li>
        @endforeach
    </ul>
    {{-- <br>
    <a href="/available-numbers/create" class="btn-btn-primary">Create All</a> --}}
@endsection
