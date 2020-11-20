@extends('layout')

@section('title', 'Recruitment Registration Form')

@section('css')
    <link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    
    <form action="/applicants" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6 mt-3">
                <h1 class="form-header">Recruitment Registration Form</h1>
            </div>
            <div class="image col-lg-4 col-md-5 col-sm-6">
                <img src="{{ asset('img/web1.png') }}" alt="Pirates Logo">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ old("first_name") }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ old("last_name") }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" name="email" value="{{ old("email") }}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" value="{{ old("phone_number") }}" required>
        </div>
        <div class="form-group">
            <label for="university">University</label>
            <input type="text" class="form-control" name="university" value="{{ old("university") }}" required>
        </div>
        <div class="form-group">
            <label for="faculty">Faculty</label>
            <input type="text" class="form-control" name="faculty" value="{{ old("faculty") }}" required>
        </div>
        <div class="form-group">
            <label for="department">Department<span style="font-size: 13px"> ( If you're not in a specific department, please, write "none")<span></label>
            <input type="text" class="form-control" name="department" value="{{ old("department") }}" required>
        </div>
        <div class="form-group">
            <label for="academic_year">Academic Year</label>
            <input type="text" class="form-control" name="academic_year" value="{{ old("academic_year") }}" required>
        </div>
        <div class="form-group">
            <label for="first_preference">First Preference</label>
            <select class="form-control" id="first_preference" name="first_preference_id" required>
                @foreach ($committees as $committee)
                    <option value="{{ $committee->id }}">{{ $committee->name }}</option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="second_preference">Second Preference</label>
            <select class="form-control" id="second_preference" name="second_preference_id" required>
                @foreach ($committees as $committee)
                    <option value="{{ $committee->id }}">{{ $committee->name }}</option> 
                @endforeach
            </select>
        </div>
        <div class="form-group workshop">
            <label for="workshop_id">Workshop</label>
            <select class="form-control" id="workshop_id" name="workshop_id">
                @foreach ($workshops as $workshop)
                    <option value="{{ $workshop->id }}">{{ $workshop->name }}</option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="available_number_id">Time Slot</label>
            <select class="form-control" id="available_number_id" name="available_number_id" required>
                @foreach ($availableNumbers as $availableNumber)
                    <option value="{{ $availableNumber->id }}" data-committee-id="{{ $availableNumber->committee_id }}">{{ $availableNumber->timeSlot->date }}</option> 
                @endforeach
            </select>
        </div>
        <br>
        <input type="submit" value="Submit" class="btn btn-light">
    </form>
@endsection

@section('js')
    <script src="/js/form.js"></script>
@endsection