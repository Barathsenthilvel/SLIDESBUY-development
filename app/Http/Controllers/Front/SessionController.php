<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SessionController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $otp = rand(100000, 999999); // Generate 6-digit OTP

        // Save OTP in session
        session(['otp' => $otp, 'otp_email' => $request->email]);

        // Send OTP Mail
        Mail::raw("Your OTP code is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Your OTP Code');
        });

        return back()->with('success', 'OTP sent successfully!');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        if ($request->otp == session('otp')) {
            return back()->with('success', 'OTP Verified!');
        }

        return back()->with('error', 'Invalid OTP!');
    }
}
