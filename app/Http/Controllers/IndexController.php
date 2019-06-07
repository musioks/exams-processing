<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    // ** get login view

    public function login()
    {
        return view('index');
    }

    // ** process login
    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        //dd($request->all());
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/admin');
        }
        return redirect()->back()->with('error', 'The system could not log you in, try again!');
    }

    // ** process logout
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');

    }

}
