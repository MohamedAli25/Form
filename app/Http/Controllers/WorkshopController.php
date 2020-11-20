<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshop::all();
        return view('workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workshops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Workshop::create([
            'name' => request('name'),
            'show' => $request->has('show')
        ]);
        return redirect('/277640/workshops');
    }

    public function createAll()
    {
        return view('workshops.createAll');
    }

    public function storeAll()
    {
        // Workshop::truncate();
        foreach (Workshop::all() as $workshop) {
            $workshop->delete();
        }
        $workshops = [
            "Business Development",
            "Business",
            "Project Management",
            "Marketing",
            "Advertising",
            "Human Resources"
        ];
        foreach ($workshops as $workshop) {
            Workshop::create([
                'name' => $workshop,
                'show' => true
            ]);
        }
        return redirect("/277640/workshops");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshop $workshop)
    {
        return view('workshops.edit', compact('workshop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workshop $workshop)
    {
        $workshop->name = request('name');
        $workshop->show = $request->has('show');
        $workshop->save();
        return redirect('/277640/workshops');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        return redirect('/277640/workshops');
    }
}
