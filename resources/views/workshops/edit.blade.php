@extends('layout')

@section('title', 'Edit a Workshop')

@section('content')
    <form action="/277640/workshops/{{ $workshop->id }}" method="post">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="name">Enter the Name of the Workshop</label>
            <input type="text" class="form-control" value="{{ $workshop->name }}" name="name">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="shown" name="show" {{ $workshop->show ? "checked" : "" }}>
            <label class="form-check-label" for="show">Show</label>
        </div>
        <input type="submit" value="Edit" class="btn btn-primary">
    </form>
    <br>
    <form action="/277640/workshops/{{ $workshop->id }}" method="post">
        @csrf
        @method("DELETE")
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
@endsection