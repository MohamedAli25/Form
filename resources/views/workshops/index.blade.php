@extends('layout')

@section('title', 'Show all Workshops')

@section('content')
    <h1>All Workshops</h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Workshop</th>
            <th scope="col">First Preference</th>
            <th scope="col">Second Preference</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workshops as $workshop)
                <tr>
                    <td><a href="/277640/workshops/{{ $workshop->id }}/edit">{{ $workshop->name }}</a></td>
                    <td>{{ count($workshop->applicants->filter(function ($applicant, $key) {
                        return $applicant->firstPreference->name === "Academic";
                    })) }}</td>
                    <td>{{ count($workshop->applicants->filter(function ($applicant, $key) {
                        return $applicant->secondPreference->name === "Academic";
                    })) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="/277640/workshops/create" class="btn-btn-primary">Create</a>
@endsection
