<?php

namespace App\Http\Controllers\Academics;

use App\Academics\Intake;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intakes = Intake::latest()->get();
        return view('intakes.index', compact('intakes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'cutoff_date' => 'required|date|after:start_date',
        ]);
        // dd($validated);
        try {
            Intake::create($validated);
            return redirect()->back()->with('success', 'Intake has been created');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Intake could not been created,try again!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academics\Intake  $intake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intake $intake)
    {
        $validated = $this->validate($request, [
            'name' => '',
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            'cutoff_date' => 'date|after:start_date',
        ]);
        // dd($validated);
        try {
            $intake->update($validated);
            return redirect()->back()->with('success', 'Intake has been updated');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Intake could not been updated,try again!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academics\Intake  $intake
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intake $intake)
    {
        try {
            $intake->delete();
            return redirect()->back()->with('success', 'Intake has been deleted!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Intake could not be deleted, please try again!');
        }
    }
}
