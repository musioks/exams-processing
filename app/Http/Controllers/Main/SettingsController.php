<?php

namespace App\Http\Controllers\Main;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('main.profile', ['user' => $user]);
    }

    public function getPassword()
    {
        $user = Auth::user();
        return view('main.password', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        // dd($request->all());
        $user->update(array_merge($request->all()));
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $request->avatar->move('assets/images/users/', $fileName);
            $user->update(['avatar' => $fileName]);
        }
        return redirect()->back()->with('success', 'Profile has been updated!');

    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'cpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        if (!(Hash::check($request->get('cpassword'), Auth::user()->password))) {
// The passwords matches
            return redirect()->back()->with('error', 'Your current password does not match with the password you provided. Please try again.!');
        }
        if (strcmp($request->get('cpassword'), $request->get('password')) == 0) {
//Current password and new password are same
            return redirect()->back()->with('error', 'New Password cannot be same as your current password. Please choose a different password!');
        }

//Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect()->back()->with('success', 'Password changed successfully!');
    }
}
