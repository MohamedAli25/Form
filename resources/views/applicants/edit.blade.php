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
    <form action="/277640/applicants/{{ $applicant->id }}" method="post">
        @csrf
        @method("PATCH")
        <div class="row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ $applicant->first_name }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ $applicant->last_name }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" name="email" value="{{ $applicant->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" value="{{ $applicant->phone_number }}" required>
        </div>
        <div class="form-group">
            <label for="university">University</label>
            <input type="text" class="form-control" name="university" value="{{ $applicant->university }}" required>
        </div>
        <div class="form-group">
            <label for="faculty">Faculty</label>
            <input type="text" class="form-control" name="faculty" value="{{ $applicant->faculty }}" required>
        </div>
        <div class="form-group">
            <label for="department">Department<span style="font-size: 13px"> ( If you're not in a specific department, please, write "none")<span></label>
            <input type="text" class="form-control" name="department" value="{{ $applicant->department }}" required>
        </div>
        <div class="form-group">
            <label for="academic_year">Academic Year</label>
            <input type="text" class="form-control" name="academic_year" value="{{ $applicant->academic_year }}" required>
        </div>
        <div class="form-group">
            <label for="first_preference">First Preference</label>
            <select class="form-control" id="first_preference" name="first_preference_id" required>
                @foreach ($committees as $committee)
                    <option value="{{ $committee->id }}" {{ $committee->id == $applicant->first_preference_id ? 'selected' : '' }}>{{ $committee->name }}</option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="second_preference">Second Preference</label>
            <select class="form-control" id="second_preference" name="second_preference_id" required>
                @foreach ($committees as $committee)
                    <option value="{{ $committee->id }}" {{ $committee->id == $applicant->second_preference_id ? 'selected' : '' }}>{{ $committee->name }}</option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="available_number_id">Time Slot</label>
                <div class="row">
                    <div class="col-sm-8">
                        <select class="form-control" id="available_number_id" name="available_number_id" required>
                            @foreach ($availableNumbers as $availableNumber)
                                <option value="{{ $availableNumber->id }}" data-committee-id="{{ $availableNumber->committee_id }}" {{ $availableNumber->id == $applicant->available_number_id ? 'selected' : '' }}>{{ $availableNumber->timeSlot->date }}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <span class="align-middle">Chosen Time Slot is: {{ $applicant->availableNumber->timeSlot->date }}</span>
                    </div>
                </div>
        </div>
        <br>
        <input type="submit" value="Submit" class="btn btn-light">
    </form>
    <form action="/277640/applicants/{{ $applicant->id }}" method="post">
        @csrf
        @method("DELETE")
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
@endsection

@section('js')
    <script src="/js/form.js"></script>
@endsection