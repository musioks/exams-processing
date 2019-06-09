<?php

namespace App\Http\Controllers\Lecturers;

use App\Academics\Unit;
use App\Lecturers\Lecturer;
use App\Role;
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
        $lecturers = Lecturer::latest()->get();
        return view('lecturers.index', compact('lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'firstname' => 'required',
            'middlename' => '',
            'lastname' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'national_id' => 'required',
            'postal_address' => '',
            'mobile_number' => '',
            'email' => 'required',
            'employee_number' => '',
            'user_id' => '',
        ]);

        try {
            $name = $validated['firstname'] . ' ' . $validated['lastname'];
            $user = User::create([
                'name' => $name,
                'email' => $validated['email'],
                'is_activated' => 1,
                'admin' => 0,
                'password' => bcrypt('123456'),
            ]);
            $lecturer = Role::where('name', 'LECTURER')->first();
            $role_user = Role::where('name', 'USER')->first();
            $user->attachRoles([$lecturer->id, $role_user->id]);
            $employee_no = "EPS/2019/" . rand(1080, 10000);
            $validated['employee_number'] = $employee_no;
            $validated['user_id']=$user->id;
            // dd($validated);
            Lecturer::create($validated);
            return redirect()->back()->with('success', 'Lecturer has been created');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Lecturer could not been created,try again!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Lecturers\Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $this->validate($request, [
            'firstname' => '',
            'middlename' => '',
            'lastname' => '',
            'gender' => '',
            'dob' => '',
            'national_id' => '',
            'postal_address' => '',
            'mobile_number' => '',
            'email' => '',
        ]);

        try {
            // dd($validated);
            $lecturer->update($validated);
            return redirect()->back()->with('success', 'Lecturer has been created');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Lecturer could not been created,try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lecturers\Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        try {
            $lecturer->delete();
            return redirect()->back()->with('success', 'Lecturer has been deleted!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Lecturer could not be deleted, please try again!');
        }
    }

    /**
     * Start on Assigning Units
     * @param \App\Lecturers\Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function units(Lecturer $lecturer)
    {
        $lecturer_units = $lecturer->units()->get();
        $ids = $lecturer_units->pluck('id');
        $units = Unit::whereNotIn('id', $ids)->get();
        //dd($units);
        return view('lecturers.units', compact('units', 'lecturer_units', 'lecturer'));
    }

    public function assignUnit(Request $request, Lecturer $lecturer)
    {
        //dd($request->all());
        try {
            $lecturer->units()->attach($request->unit_id);
            return redirect()->back()->with('success', 'Unit(s) have been attached to the lecturer!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Unit(s) could not be attached, please try again!');
        }
    }

    public function detachUnit(Lecturer $lecturer, $unit_id)
    {
        try {
            $lecturer->units()->detach($unit_id);
            return redirect()->back()->with('success', 'Unit has been removed from lecturer!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'unit could not be removed, please try again!');
        }
    }
}
