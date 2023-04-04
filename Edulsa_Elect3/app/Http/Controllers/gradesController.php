<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\grades;
use App\Models\studentInfo;
use App\Models\enrolledsubjects;

class gradesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $grades = new grades();

        // $grades ->esNo = "";
        // $grades ->sNo = "";
        // $grades ->prelim = "";
        // $grades ->midterm = "";
        // $grades ->finals = "";
        // $grades ->remarks = "";

        // $grades->save();
        $grades = grades:: join('studentInfo', 'grades.sNo', '=', 'studentInfo.sNo')->get();
        return view('grades.index', compact('grades'));
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
        $grades = new grades();
        $grades->sNo = $request->xsNo;
        $grades->esNo = $request->xesNo;
        $grades->prelim = $request->xprelim;
        $grades->midterm = $request->xmidterm;
        $grades->final = $request->xfinal;
        $grades->remarks = $request->xremarks;
        $grades->final = $request->xfinal;
        $grades->save();
        return redirect()->route('grades');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $grades = grades::where('gNo', $id)->get();
        return view('grades.show', compact('grades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $grades = grades::where('gNo', $id)->get();
        return view('grades.edit', compact('grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $grades = grades::where('gNo', $id)
        ->update(
            [
            'prelim'=> $request->xprelim,
            'midterm'=> $request->xmidterm,
            'final'=> $request->xfinals,
            'remarks'=>$request->xremarks,
            ]);
        return redirect()->route('grades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $grades = grades::where('gNo', $id);
        $grades->delete();
        return redirect()->route('grades');
    }
    public function getsubjectInfo(){
        $enrolledsubjects = enrolledsubjects::all();
        $test = studentInfo::all();
        return view('grades.add', compact('enrolledsubjects', 'test'));
    }
}
