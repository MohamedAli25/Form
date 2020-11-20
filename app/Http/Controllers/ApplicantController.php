<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\AvailableNumber;
use App\Models\Committee;
use App\Models\TimeSlot;
use App\Models\Workshop;
use App\Rules\EmailDoesntExist;
use App\Rules\PhoneNumberDoesntExist;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('applicants.index', [
            'time_slots' => TimeSlot::all()->sortBy("id")
        ]);
    }

    public function indexBrief()
    {
        return view('applicants.indexBrief', [
            'time_slots' => TimeSlot::all()->sortBy("id")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(AvailableNumber::all());
        return view('applicants.create', [
            'committees' => Committee::where('show', true)->get(),
            'availableNumbers' => AvailableNumber::all()->filter(function ($value) {
                return $value->available_number > 0;
            }),
            'workshops' => Workshop::where('show', true)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chosenTimeSlot = AvailableNumber::findOrFail(request('available_number_id'));
        if ($chosenTimeSlot->available_number <= 0) {
            return redirect()->back()->withErrors('The chosen time slot is already taken');
        }
        $applicant = Applicant::create($request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', new EmailDoesntExist],
            'phone_number' => ['required', 'numeric', 'starts_with:010,011,012,015', 'digits:11', new PhoneNumberDoesntExist],
            'university' => 'required',
            'faculty' => 'required',
            'department' => 'required',
            'academic_year' => 'required',
            'first_preference_id' => 'required|numeric',
            'second_preference_id' => 'required|numeric',
            'workshop_id' => 'numeric',
            'available_number_id' => 'required|numeric'
        ]));
        $chosenTimeSlot->available_number -= 1;
        $chosenTimeSlot->save();
        $firstPreferenceCommittee = Committee::findOrFail(request('first_preference_id'));
        $secondPreferenceCommittee = Committee::findOrFail(request('second_preference_id'));
        if ($firstPreferenceCommittee->name == "Academic" || $secondPreferenceCommittee->name == "Academic") {
            $applicant->workshops()->attach(request('workshop_id'));
        }
        return redirect('/submitted-successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        $available_numbers = AvailableNumber::all()->filter(function ($value) {
            return $value->available_number > 0;
        });
        // dd($available_numbers);
        if (array_search($applicant->availableNumber->id, $available_numbers->pluck("id")->toArray()) == false) {
            $available_numbers->push($applicant->availableNumber);
            // dd($available_numbers);
        }
        return view('applicants.edit', [
            'applicant' => $applicant,
            'committees' => Committee::all(),
            'availableNumbers' => $available_numbers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        $applicant_data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'numeric', 'starts_with:010,011,012,015', 'digits:11'],
            'university' => 'required',
            'faculty' => 'required',
            'department' => 'required',
            'academic_year' => 'required',
            'first_preference_id' => 'required|numeric',
            'second_preference_id' => 'required|numeric',
            'available_number_id' => 'required|numeric'
        ]);
        $applicant->availableNumber->available_number += 1;
        $applicant->availableNumber->save();
        $chosenTimeSlot = AvailableNumber::findOrFail(request('available_number_id'));
        if ($chosenTimeSlot->available_number <= 0) {
            $applicant->availableNumber->available_number -= 1;
            $applicant->availableNumber->save();
            return redirect()->back()->withErrors('The chosen time slot is already taken');
        }
        $applicant->delete();
        Applicant::create($applicant_data);
        $chosenTimeSlot->available_number -= 1;
        $chosenTimeSlot->save();
        return redirect('/277640/applicants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        $applicant->availableNumber->available_number = ((int)($applicant->availableNumber->available_number)) + 1;
        $applicant->availableNumber->save();
        $applicant->delete();
        return redirect("/277640/applicants");
    }
}
