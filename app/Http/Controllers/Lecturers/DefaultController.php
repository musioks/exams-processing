<?php

namespace App\Http\Controllers\Lecturers;

use App\Lecturers\Lecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(){
        $lecturer=Lecturer::find(Auth::user()->lecturer->id);
        $units=$lecturer->units()->get();
       // dd($units);
        return view('portals.lecturer.units',compact('lecturer','units'));
    }
    public function exams(){
        $lecturer=Lecturer::find(Auth::user()->lecturer->id);
        $units=$lecturer->units()->get();
        return view('portals.lecturer.exams',compact('lecturer','units'));
    }
}
