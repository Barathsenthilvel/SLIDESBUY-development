<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Override default redirect path.
     */
    protected function redirectTo()
    {
        return route('login.form'); // your custom login route
    }

    /**
     * Override the resetPassword method to prevent auto-login.
     */
    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);
        $user->setRememberToken(Str::random(60));
        $user->save();

        // Do NOT log in the user here
        // $this->guard()->login($user); // <-- removed
    }

    /**
     * Optional: Invalidate session + flash message
     */
    protected function sendResetResponse(Request $request, $response)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('status', trans($response));
    }
}
