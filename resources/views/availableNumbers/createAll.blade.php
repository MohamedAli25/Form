@extends('layout')

@section('title', 'Create all time slots for every committee')

@section('css')
    <link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')
    <form action="/277640/available-numbers/storeAll" method="post">
        @csrf
        <h2>Are you sure you want to do this?</h2>
        <h2>This will remove all the dates and recreate them</h2>
        <input type="submit" value="Create All" class="btn btn-light">
    </form>
@endsection