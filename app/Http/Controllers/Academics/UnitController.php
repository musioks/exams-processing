<?php

namespace App\Http\Controllers\Academics;

use App\Academics\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::latest()->get();
        return view('units.index', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$this->validate($request,[
            'name'=>'required',
            'code'=>'required',
            'max_hrs'=>'required',
            'description'=>'required',
        ]);
        try {
            Unit::create($validated);
            return redirect()->back()->with('success','Unit has been created');
        }
        catch(\Exception $exception){
            return redirect()->back()->with('error','Unit could not been created,try again!');
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academics\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $validated=$this->validate($request,[
            'name'=>'',
            'code'=>'',
            'max_hrs'=>'',
            'description'=>'',
        ]);
        try {
            $unit->update($validated);
            return redirect()->back()->with('success', 'Unit has been updated!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Unit could not be updated, please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academics\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        try {
            $unit->delete();
            return redirect()->back()->with('success', 'Unit has been deleted!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Unit could not be deleted, please try again!');
        }
    }

}
