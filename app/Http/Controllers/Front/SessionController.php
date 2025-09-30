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

        // Send styled OTP email using the Mailable that renders mails.otp
        try {
            \Mail::to($request->email)
                ->send(new \App\Mail\SendOtpMail($otp, $request->input('name')));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send OTP: ' . $e->getMessage());
        }

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
