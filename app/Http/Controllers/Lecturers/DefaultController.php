<?php

namespace App\Http\Controllers\Lecturers;

use App\Academics\Exams;
use App\Academics\Scores;
use App\Lecturers\Lecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    public function index()
    {
        $lecturer = Lecturer::find(Auth::user()->lecturer->id);
        $units = $lecturer->units()->get();
        // dd($units);
        return view('portals.lecturer.units', compact('lecturer', 'units'));
    }

    public function exams()
    {
        $lecturer = Lecturer::find(Auth::user()->lecturer->id);
        $units = $lecturer->units()->get();
        return view('portals.lecturer.exams', compact('lecturer', 'units'));
    }

    public function view_exams($id)
    {
        $exam = Exams::find($id);
        $students = DB::table('batch_student')
            ->join('students', 'batch_student.student_id', '=', 'students.id')
            ->join('batches', 'batch_student.batch_id', '=', 'batches.id')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->select('batch_student.*', 'students.*', 'batches.name as batch_name', 'courses.name as course_name')
            ->where('batch_student.batch_id', $exam->batch_id)
            ->get();
        //dd($students);
        return view('portals.lecturer.marks', compact('students', 'exam'));
    }

    public function submitMarks(Request $request)
    {
        $test_id = $request->exam_id;
        $score = $request->score;
        $student_id = $request->student_id;
        $count = collect($student_id)->count();
        for ($i = 0; $i < $count; $i++) {
            Scores::updateOrCreate([

                'student_id' => $student_id[$i],
                'exam_id' => $test_id], ['score' => $score[$i]]);
        }
        return redirect()->back()->with('info', 'Marks have been submitted');
    }
    public function results($id)
    {
        $exam = Exams::find($id);
        $results = DB::table('scores')
            ->join('exams', 'scores.exam_id', 'exams.id')
            ->join('batches', 'exams.batch_id', 'batches.id')
            ->join('students', 'scores.student_id', 'students.id')
            ->select('scores.*', 'exams.total_marks', 'exams.name as exam', 'students.admission_no as adm', 'students.firstname', 'students.surname', 'batches.name as batch')
            ->where('scores.exam_id', $id)->get();
        //dd($results);
        return view('portals.lecturer.results', compact('results', 'exam'));
    }
}
