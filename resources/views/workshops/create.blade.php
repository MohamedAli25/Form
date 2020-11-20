@extends('layout')

@section('title', 'Create a Workshop')

@section('content')
    <form action="/277640/workshops" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Enter the Name of the Workshop</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="shown" name="show">
            <label class="form-check-label" for="show">Show</label>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
@endsection
