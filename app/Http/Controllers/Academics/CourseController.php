<?php

namespace App\Http\Controllers\Academics;

use App\Academics\Course;
use App\Academics\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view('courses.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required',
            'course_code' => 'required',
            'duration' => 'required',
            'duration_type' => 'required',
            'description' => '',
        ]);
        // dd($validated);
        try {
            Course::create($validated);
            return redirect()->back()->with('success', 'Course has been created');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Course could not been created,try again!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Academics\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validated = $this->validate($request, [
            'name' => '',
            'course_code' => '',
            'duration' => '',
            'duration_type' => '',
            'description' => '',
        ]);
        try {
            $course->update($validated);
            return redirect()->back()->with('success', 'Course has been updated!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Course could not be updated, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Academics\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();
            return redirect()->back()->with('success', 'Course has been deleted!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Course could not be deleted, please try again!');
        }
    }

    /**
     * Start on Assigning Units
     * @param \App\Academics\Course $course
     * @return \Illuminate\Http\Response
     */
    public function units(Course $course)
    {
        $course_units = $course->units()->get();
        $ids = $course_units->pluck('id');
        $units = Unit::whereNotIn('id', $ids)->get();
        //dd($batches);
        return view('courses.units', compact('units', 'course_units', 'course'));
    }

    public function assignUnit(Request $request, Course $course)
    {
        //dd($request->all());
        try {
            $course->units()->attach($request->unit_id);
            return redirect()->back()->with('success', 'Unit(s) have been attached to the course!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Unit(s) could not be attached, please try again!');
        }
    }

    public function detachUnit(Course $course, $unit_id)
    {
        try {
            $course->units()->detach($unit_id);
            return redirect()->back()->with('success', 'Unit has been removed from course!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'unit could not be removed, please try again!');
        }
    }
}
