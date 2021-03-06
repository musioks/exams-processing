<?php

namespace App\Http\Controllers\Academics;

use App\Academics\Academic_year;
use App\Academics\Batch;
use App\Academics\Course;
use App\Academics\Semester_term;
use App\Academics\Year_of_study;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::latest()->get();
        $academic_year = Academic_year::where('status', 1)->first();
        $terms = Semester_term::all();
        $study_years = Year_of_study::all();
        $courses = Course::all();
        return view('batches.index', compact('batches', 'academic_year', 'terms', 'study_years', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$this->validate($request,[
            'name'=>'required',
            'course_id'=>'required',
            'year_of_study_id'=>'required',
            'academic_year_id'=>'required',
            'term_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ]);
        try {
            Batch::create($validated);
            return redirect()->back()->with('success','Batch has been created');
        }
        catch(\Exception $exception){
            return redirect()->back()->with('error','Batch could not been created,try again!');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Academics\Batch $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        $validated=$this->validate($request,[
            'name'=>'',
            'course_id'=>'',
            'year_of_study_id'=>'',
            'academic_year_id'=>'',
            'term_id'=>'',
            'start_date'=>'',
            'end_date'=>'',
        ]);
        try {
            $batch->update($validated);
            return redirect()->back()->with('success','Batch has been updated');
        }
        catch(\Exception $exception){
            return redirect()->back()->with('error','Batch could not been updated,try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Academics\Batch $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        try {
            $batch->delete();
            return redirect()->back()->with('success', 'Batch has been deleted!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Batch could not be deleted, please try again!');
        }
    }
    /**
     * Start on Assigning Units
     * @param \App\Academics\Batch $batch
     * @return \Illuminate\Http\Response
     */
    public function units(Batch $batch)
    {
        $course=Course::find($batch->course_id);
        $batch_units=$batch->units()->get();
        $ids = $batch_units->pluck('id');
        $units = $course->units()->whereNotIn('id', $ids)->get();
        //dd($batches);
        return view('batches.units', compact('units', 'batch_units', 'batch'));
    }

    public function assignUnit(Request $request, Batch $batch)
    {
        //dd($request->all());
        try {
            $batch->units()->attach($request->unit_id);
            return redirect()->back()->with('success', 'Unit(s) have been attached to the batch!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Unit(s) could not be attached, please try again!');
        }
    }

    public function detachUnit(Batch $batch, $unit_id)
    {
        try {
            $batch->units()->detach($unit_id);
            return redirect()->back()->with('success', 'Unit has been removed from batch!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'unit could not be removed, please try again!');
        }
    }
}
