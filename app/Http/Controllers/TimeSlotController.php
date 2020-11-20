<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("timeSlots.index", [
            'timeSlots' => TimeSlot::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view("timeSlots.create");
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
        return view("timeSlots.createAll");
    }

    public function storeAll()
    {
        $days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday"];
        $hours = [
            "From 12-00 To 12-30",
            "From 12-30 To 13-00",
            "From 13-00 To 13-30",
            "From 13-30 To 14-00",
            "From 14-00 To 14-30",
            "From 14-30 To 15-00",
            "From 15-00 To 15-30",
            "From 15-30 To 16-00",
            "From 16-00 To 16-30",
            "From 16-30 To 17-00",
        ];
        TimeSlot::truncate();
        foreach ($days as $day) {
            foreach ($hours as $hour) {
                TimeSlot::create([
                    'date' => ($day . " " . $hour)
                ]);
            }
        }
        return redirect("/277640/time-slots");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSlot $timeSlot)
    {
        return view("timeSlots.show", compact("timeSlot"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSlot $timeSlot)
    {
        //
    }
}
