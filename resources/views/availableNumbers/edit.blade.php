@extends('layout')

@section('title', 'Edit an Academic Year')

@section('content')
    <form action="/academic-years/{{ $academicYear->id }}" method="post">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="name">Enter the Name of the Academic Year</label>
            <input type="text" class="form-control" value="{{ $academicYear->name }}" name="name">
            <br>
            <input type="submit" value="Edit" class="btn btn-primary">
        </div>
    </form>
    <br>
    <form action="/academic-years/{{ $academicYear->id }}" method="post">
        @csrf
        @method("DELETE")
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
@endsection
