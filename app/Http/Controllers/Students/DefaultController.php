<?php

namespace App\Http\Controllers\Students;

use App\Students\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('portals.student.exams', compact('student', 'my_units','units'));
    }
}
