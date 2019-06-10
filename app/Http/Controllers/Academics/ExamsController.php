<?php

namespace App\Http\Controllers\Academics;

use App\Academics\Batch;
use App\Academics\Exam_type;
use App\Academics\Exams;
use App\Academics\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \App\Academics\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function index(Unit $unit)
    {
        $exams=Exams::where('unit_id',$unit->id)->latest()->get();
        $batches=Batch::latest()->get();
        $exam_types=Exam_type::all();
        return view('units.exams',compact('unit','exams','batches','exam_types'));
    }
    /**
     * Store a newly created resource in storage.
     * @param  \App\Academics\Unit  $unit
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Unit $unit)
    {
       // dd($request->all());
        $validated = $this->validate($request, [
            'name' => 'required',
            'exam_type_id' => 'required',
            'batch_id' => 'required',
            'unit_id' => '',
            'total_marks' => '',
            'exam_date' => '',
        ]);
        // dd($validated);
        try {
            Exams::create($validated);
            return redirect()->back()->with('success', 'Exam has been created');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Exam could not been created,try again!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academics\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exams $exams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academics\Unit  $unit
     * @param  \App\Academics\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit,Exams $exams)
    {
        try {
            $exams->delete();
            return redirect()->back()->with('success', 'Exam has been deleted!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Exam could not be deleted, please try again!');
        }
    }
}
