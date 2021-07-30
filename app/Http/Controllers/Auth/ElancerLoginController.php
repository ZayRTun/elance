<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ElancerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.elancer-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->guard()->attempt($credentials, $request->remember)) {
            return redirect()->intended(route('elancer.home'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    protected function guard()
    {
        return Auth::guard('elancer');
    }
}
