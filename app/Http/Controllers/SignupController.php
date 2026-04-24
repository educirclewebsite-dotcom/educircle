<?php
namespace App\Http\Controllers;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function show()
    {
        return view('signup');
    }

    public function sendOtp(Request $request)
    {
        $validates = $request->validate([
            'email' => 'required|email',
        ]);
        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'This email is already registered.',
            ]);
        }

        $otpCode = rand(100000, 999999);
        $otp = new Otp();
        $otp->otp = $otpCode;
        $otp->email = $request->email;
        $otp->save();

        try {
            Mail::send('emails.otp', ['otpCode' => $otpCode], function ($message) use ($request) {
                $message->to($request->email)
                    ->subject("Your OTP Code")
                    ->from(env('MAIL_FROM_ADDRESS', 'educircle.website@gmail.com'), 'Educircle');
            });
            return response()->json(['success' => true, 'message' => 'successfully save']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Mail Error: ' . $e->getMessage()]);
        }

    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $otpEntry = Otp::where('email', $request->email)
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->first();

        if ($otpEntry && $otpEntry->otp == $request->otp) {

            $otpEntry->status = 'used';
            $otpEntry->save();

            return response()->json([
                'success' => true,
                'message' => 'OTP Verified.',
                'redirect' => route('signup'),
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid OTP.']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        $user->assignRole('student');
        return redirect(route('student.dashboard', [], false));
    }
}
