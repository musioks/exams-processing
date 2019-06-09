<?php

namespace App\Http\Controllers\Students;

use App\Academics\Batch;
use App\Academics\Intake;
use App\Role;
use App\Students\Student;
use App\Students\Student_status;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->get();
        $intakes = Intake::all();
        $status = Student_status::where('name', 'Rejected')->first();
        // dd($status);

        //dd($intakes);
        return view('students.index', compact('students', 'intakes', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $this->validate($request, [
            'firstname' => 'required',
            'middlename' => '',
            'surname' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'national_id' => '',
            'mobile_no' => '',
            'email' => 'required',
            'admission_no' => '',
            'batch_id' => 'required',
            'status_id' => 'required',
            'user_id' => '',
        ]);
//
        try {
            $name = $validated['firstname'] . ' ' . $validated['surname'];
            $user = User::create([
                'name' => $name,
                'email' => $validated['email'],
                'is_activated' => 1,
                'admin' => 0,
                'password' => bcrypt('123456'),
            ]);
            $student = Role::where('name', 'STUDENT')->first();
            $role_user = Role::where('name', 'USER')->first();
            $user->attachRoles([$student->id, $role_user->id]);
            $batch = Batch::find($validated['batch_id']);
            $validated['user_id'] = $user->id;
            $validated['course_id'] = $batch->course_id;
            unset($validated['batch_id']);
            // dd($batch);
            $student = Student::create($validated);
            $batch->students()->attach($student->id);
            return redirect()->back()->with('success', 'Student has been created');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Student could not been created,try again!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Students\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validated = $this->validate($request, [
            'firstname' => '',
            'middlename' => '',
            'surname' => '',
            'gender' => '',
            'dob' => '',
            'national_id' => '',
            'mobile_no' => '',
            'email' => '',
        ]);
//
        try {
            $student->update($validated);
            return redirect()->back()->with('success', 'Student has been updated');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Student could not been updated,try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Students\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->back()->with('success', 'Student has been deleted!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Student could not be deleted, please try again!');
        }
    }
}
