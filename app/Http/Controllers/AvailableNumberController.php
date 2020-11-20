<?php

namespace App\Http\Controllers;

use App\Models\AvailableNumber;
use App\Models\Committee;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class AvailableNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("availableNumbers.index", ['committees' => Committee::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function createAll()
    {
        return view("availableNumbers.createAll");
    }

    public function storeAll()
    {
        AvailableNumber::truncate();
        foreach (TimeSlot::all() as $time_slot) {
            foreach (Committee::all() as $committee) {
                AvailableNumber::create([
                    'committee_id' => $committee->id,
                    'time_slot_id' => $time_slot->id,
                    'available_number' => 0
                ]);
            }
        }
        return redirect("/277640/available-numbers");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AvailableNumber  $availableNumber
     * @return \Illuminate\Http\Response
     */
    public function show(AvailableNumber $availableNumber)
    {
        //
    }

    public function editAll(Committee $committee)
    {
        return view("availableNumbers.editAll", [
            'committee' => $committee,
            'available_numbers' => $committee->availableNumbers->sortBy('id')
        ]);
    }

    public function updateAll(Request $request, Committee $committee)
    {
        foreach ($committee->availableNumbers as $available_number) {
            $available_number->available_number = request($available_number->id);
            $available_number->save();
        }
        return redirect("/277640/available-numbers");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AvailableNumber  $availableNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(AvailableNumber $availableNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AvailableNumber  $availableNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AvailableNumber $availableNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AvailableNumber  $availableNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(AvailableNumber $availableNumber)
    {
        //
    }
}
