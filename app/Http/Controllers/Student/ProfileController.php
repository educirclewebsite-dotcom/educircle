<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function edit()
    {

        $user = Auth::user();

        return view('student.update_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
        ]);

        $user        = Auth::user();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();
        session()->flash('success_msg', "Update Successfully!");
        return redirect()->route('profile.edit');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password'     => 'required|string|confirmed|min:6',
        ]);

        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success_msg', "Your Password has been changed.");
        } else {
            session()->flash('danger_msg', 'Your old password is incorrect.');
        }

        return redirect()->route('profile.edit');
    }
}
