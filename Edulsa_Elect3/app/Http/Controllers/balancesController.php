<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\balances;
use App\Models\studentInfo;
class balancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $balances = balances:: join('studentinfo', 'balances.sNo', '=', 'studentInfo.sNo')->get();
        return view('balances.index', compact('balances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //hehe
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $balances = new balances();
        $balances->sno = $request->xsno;
        $balances->amountDue = $request->xamountDue;
        $balances->totalBalance = $request->xtotalBalance;
        $balances->notes = $request->xnotes;
        $balances->save();
        return redirect()->route('balances');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $balances = balances::where('bNo', $id)->get();
        return view('balances.show', compact('balances'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $balances = balances::where('bNo', $id)->get();
        return view('balances.edit', compact('balances'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $balances = balances::where('bNo', $id)
        ->update(
            ['amountDue'=> $request->xamountDue,
            'totalBalance'=> $request->xtotalBalance,
            'notes'=> $request->xnotes,
            ]);
        return redirect()->route('balances');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $balances = balances::where('bNo', $id);
        $balances->delete();
        return redirect()->route('balances');
    }

    public function getstudentInfo(){
        $studentinfos = studentInfo::all();
        return view('balances.add', compact('studentInfo'));
    }
}
