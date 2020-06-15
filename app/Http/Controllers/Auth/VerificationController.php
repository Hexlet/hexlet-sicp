<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    use VerifiesEmails {
        verify as protected verifyEmail;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function redirectTo()
    {
        return route('my');
    }

    public function verify(\Illuminate\Http\Request $request)
    {
        flash(__('auth.mail.verified'));
        return $this->verifyEmail($request);
    }
}
