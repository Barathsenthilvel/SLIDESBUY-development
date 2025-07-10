<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
}