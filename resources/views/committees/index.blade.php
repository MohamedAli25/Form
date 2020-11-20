@extends('layout')

@section('title', 'Show all Committees')

@section('content')
    <h1>All Committees</h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Committee</th>
            <th scope="col">First Preference</th>
            <th scope="col">Second Preference</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($committees as $committee)
                <tr>
                    <td><a href="/277640/committees/{{ $committee->id }}/edit">{{ $committee->name }}</a></td>
                    <td>{{ count($committee->firstPreference) }}</td>
                    <td>{{ count($committee->secondPreference) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="/277640/committees/create" class="btn-btn-primary">Create</a>
@endsection
