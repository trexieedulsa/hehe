<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\enrolledsubjects;


class enrolledsubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $enrolledsubjects = new enrolledsubjects();

        // $enrolledsubjects ->subjectCode = "";
        // $enrolledsubjects ->description = "";
        // $enrolledsubjects ->units = "";
        // $enrolledsubjects ->schedule = "";

        // $enrolledsubjects->save();

        $enrolledsubjects = enrolledsubjects:: all();
        return view('enrolledsubjects/index' , compact('enrolledsubjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData =$request->validate([
            'xsubjectCode' => ['required', 'max:12'],
            'xdescription' =>['required', 'max:100'],
            'xunits'=>['required'],
            'xschedule' =>['required', 'max:30'],
        ]);

        $enrolledsubjects = new enrolledsubjects();
        $enrolledsubjects->subjectCode=$request->xsubjectCode;
        $enrolledsubjects->description=$request->xdescription;
        $enrolledsubjects->units=$request->xunits;
        $enrolledsubjects->schedule=$request->xschedule;
        $enrolledsubjects ->save();
        return redirect()->route('enrolledsubjects');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $enrolledsubjects = enrolledsubjects::where('esNo', $id)->get();
        return view('enrolledsubjects.show', compact('enrolledsubjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $enrolledsubjects = enrolledsubjects::where('esNo', $id)->get();
        return view('enrolledsubjects.edit', compact('enrolledsubjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData =$request->validate([
            'xsubjectCode' => ['required', 'max:12'],
            'xdescription' =>['required', 'max:100'],
            'xunits'=>['required'],
            'xschedule' =>['required', 'max:30'],

        ]);


        $enrolledsubjects = enrolledsubjects::where('esNo', $id)
        ->update(
             ['subjectCode' => $request->xsubjectCode,
             'description'=> $request->xdescription,
             'units'=> $request->xunits,
             'schedule'=> $request->xschedule,
             ]);
          return redirect()->route('enrolledsubjects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $enrolledsubjects = enrolledsubjects::where('esNo', $id);
        $enrolledsubjects->delete();
        return redirect()->route('enrolledsubjects');
    }
}
