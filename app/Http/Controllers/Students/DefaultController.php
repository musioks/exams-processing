<?php

namespace App\Http\Controllers\Students;

use App\Students\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class DefaultController extends Controller
{
    public function index()
    {
        $student = Student::find(Auth::user()->student->id);
        $my_units = $student->units()->get();
        $ids = $my_units->pluck('id');
        $batch = $student->batches()->first();
        // dd($batch);
        $units = $batch->units()->whereNotIn('id', $ids)->get();
        // dd($units);
        return view('portals.student.units', compact('student', 'units', 'my_units'));
    }

    public function exams()
    {
        $student = Student::find(Auth::user()->student->id);
        $my_units = $student->units()->get();
        $ids = $my_units->pluck('id');
        $batch = $student->batches()->first();
        $units = $batch->units()->whereNotIn('id', $ids)->get();
        return view('portals.student.exams', compact('student', 'my_units', 'units'));
    }

    public function register_units(Request $request)
    {
       // dd($request->all());
        $student = Student::find($request->student_id);
        $student->units()->attach($request->unit_id);
        return redirect()->back()->with('success', 'Unit(s) have been registered!');

    }
    public function results()
    {
        $student = Student::find(Auth::user()->student->id);
        $results = $student->scores()->get();
        //dd($results);
        return view('portals.student.results', compact('results','student'));
    }
    public function slip()
    {
        $student = Student::find(Auth::user()->student->id);
        $results = $student->scores()->get();
        $pdf = PDF::loadView('portals.student.slip',
            [
                'results' => $results,
                'student' => $student,
            ]
        )->setPaper('a4', 'landscape');
        return $pdf->stream("Result_slip_{$student->admission_no}.pdf");
    }
}
