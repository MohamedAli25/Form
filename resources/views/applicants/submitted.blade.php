@extends('layout')

@section('title', 'Submitted Successfully')

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6 order-last order-md-first">
                <h1 class="form-header">Submitted Successfully</h1>
                <p>Thank you for applying.</p>
                <p>Waiting for you.</p>
            </div>
            <div class="image col-md-6 order-first order-md-last">
                <img src="{{ asset('img/web1.png') }}" alt="Pirates Logo">
            </div>
        </div>
        <blockquote class="blockquote text-center">
            <p class="mb-0">"A journey of a thousand miles begins with a single step"</p>
            <footer class="blockquote-footer" style="color:white;font-size:18px;">Lao Tzu</footer>
        </blockquote>
    </div>
@endsection