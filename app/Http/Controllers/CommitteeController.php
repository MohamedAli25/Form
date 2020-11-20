<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committees = Committee::all();
        return view('committees.index', compact('committees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('committees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request(['name']));
        // Committee::create(request(['name']));
        Committee::create([
            'name' => request('name'),
            'show' => $request->has('show')
        ]);
        return redirect('/277640/committees');
    }

    public function createAll()
    {
        return view('committees.createAll');
    }

    public function storeAll()
    {
        Committee::truncate();
        $committees = [
            "Human Resources",
            "Advertising",
            "Quality Management",
            "Information Technology",
            "Public Relations and Marketing",
            "Fundraising",
            "Logistics",
            "Academic",
        ];
        foreach ($committees as $committee) {
            Committee::create([
                'name' => $committee,
                'show' => true
            ]);
        }
        return redirect("/277640/committees");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function edit(Committee $committee)
    {
        return view('committees.edit', compact('committee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Committee $committee)
    {
        $committee->name = request('name');
        $committee->show = $request->has('show');
        $committee->save();
        return redirect('/277640/committees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee)
    {
        $committee->delete();
        return redirect('/277640/committees');
    }
}
