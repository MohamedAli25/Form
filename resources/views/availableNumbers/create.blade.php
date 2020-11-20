@extends('layout')

@section('title', 'Create an Avaialble Number')

@section('content')
    <form action="/277640/available-numbers" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Enter the Name of the Academic Year</label>
            <input type="text" class="form-control" name="name">
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
@endsection