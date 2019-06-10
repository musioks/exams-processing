<?php

namespace App\Http\Controllers\Main;

use App\Academics\Batch;
use App\Academics\Course;
use App\Academics\Unit;
use App\Students\Student;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $courses=Course::count();
        $batches=Batch::count();
        $units=Unit::count();
        $students=Student::latest()->get();
        $users=User::count();
        return view('main.index',compact('students','courses','units','batches','users'));
    }
}
