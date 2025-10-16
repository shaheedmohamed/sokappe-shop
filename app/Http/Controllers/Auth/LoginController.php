<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            // Check if registration is completed
            if (!$user->registration_completed) {
                return redirect()->route('register.choose-type');
            }

            // Redirect based on user type
            if ($user->user_type === 'vendor') {
                return redirect()->route('vendor.profile')->with('success', 'مرحباً بك مرة أخرى!');
            } else {
                return redirect()->route('home')->with('success', 'مرحباً بك مرة أخرى!');
            }
        }

        return redirect()->back()
            ->withErrors(['email' => 'البيانات المدخلة غير صحيحة'])
            ->withInput($request->only('email'));
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home')->with('success', 'تم تسجيل الخروج بنجاح');
    }
}
