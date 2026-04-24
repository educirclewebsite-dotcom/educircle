<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user        = Auth::user();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();
        session()->flash('success_msg', " Profile Update Successfully!");
        return redirect()->route('admin.profile.edit');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password'     => 'required|string|confirmed|min:6',
        ]);

        $user = Auth::user();

        if (! Hash::check($request->old_password, $user->password)) {
            session()->flash('success_msg', "'Old password is incorrect.!");
            return redirect()->route('admin.profile.edit');
        }

        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('success_msg', " Password updated successfully!");
        return redirect()->route('admin.profile.edit');
    }
}
