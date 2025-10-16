<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Show the registration form (Step 1)
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle Step 1 registration (Basic Info)
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'governorate' => ['required', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'governorate' => $request->governorate,
            'city' => $request->city,
            'user_type' => 'customer', // Default
            'registration_completed' => false,
        ]);

        Auth::login($user);

        return redirect()->route('register.choose-type');
    }

    /**
     * Show account type selection (Step 2)
     */
    public function showChooseType()
    {
        if (!Auth::check() || Auth::user()->registration_completed) {
            return redirect()->route('home');
        }

        return view('auth.choose-type');
    }

    /**
     * Handle account type selection
     */
    public function chooseType(Request $request)
    {
        $request->validate([
            'user_type' => ['required', 'in:customer,vendor']
        ]);

        $user = Auth::user();
        $user->update(['user_type' => $request->user_type]);

        if ($request->user_type === 'customer') {
            // Complete registration for customers
            $user->update(['registration_completed' => true]);
            return redirect()->route('products.index')->with('success', 'مرحباً بك في Sokappe! يمكنك الآن تصفح المنتجات.');
        } else {
            // Redirect to store setup for vendors
            return redirect()->route('register.store-setup');
        }
    }

    /**
     * Show store setup form (Step 3 for vendors)
     */
    public function showStoreSetup()
    {
        if (!Auth::check() || Auth::user()->user_type !== 'vendor' || Auth::user()->registration_completed) {
            return redirect()->route('home');
        }

        return view('auth.store-setup');
    }

    /**
     * Handle store setup
     */
    public function storeSetup(Request $request)
    {
        $request->validate([
            'store_name' => ['required', 'string', 'max:255'],
            'store_phone' => ['required', 'string', 'max:20'],
            'store_description' => ['required', 'string', 'max:1000'],
            'store_address' => ['required', 'string', 'max:500'],
            'store_latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'store_longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);

        $user = Auth::user();
        $user->update([
            'store_name' => $request->store_name,
            'store_phone' => $request->store_phone,
            'store_description' => $request->store_description,
            'store_address' => $request->store_address,
            'store_latitude' => $request->store_latitude,
            'store_longitude' => $request->store_longitude,
            'registration_completed' => true,
            'store_created_at' => now(),
        ]);

        return redirect()->route('vendor.profile')->with('success', 'تم إنشاء متجرك بنجاح! مرحباً بك في Sokappe.');
    }
}
