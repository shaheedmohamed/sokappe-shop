<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of vendors.
     */
    public function index()
    {
        $vendors = User::where('user_type', 'vendor')
            ->where('registration_completed', true)
            ->paginate(12);

        return view('vendors.index', compact('vendors'));
    }

    /**
     * Display the specified vendor.
     */
    public function show(User $vendor)
    {
        // Check if user is a vendor
        if ($vendor->user_type !== 'vendor' || !$vendor->registration_completed) {
            abort(404);
        }

        // Get vendor's products
        $products = Product::where('user_id', $vendor->id)
            ->where('is_active', true)
            ->with(['category'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        // Get vendor statistics
        $stats = [
            'total_products' => Product::where('user_id', $vendor->id)->count(),
            'active_products' => Product::where('user_id', $vendor->id)->where('is_active', true)->count(),
            'total_views' => Product::where('user_id', $vendor->id)->sum('views_count') ?? 0,
            'store_rating' => $vendor->store_rating ?? 0,
        ];

        return view('vendors.show', compact('vendor', 'products', 'stats'));
    }

    /**
     * Display featured vendors.
     */
    public function featured()
    {
        $vendors = Vendor::active()
            ->verified()
            ->where('rating', '>=', 4.0)
            ->withCount('products')
            ->orderBy('rating', 'desc')
            ->paginate(20);

        return view('vendors.featured', compact('vendors'));
    }

    /**
     * Show vendor profile (for logged in vendor)
     */
    public function profile()
    {
        $user = Auth::user();
        
        if (!$user || $user->user_type !== 'vendor') {
            return redirect()->route('home');
        }

        // Check store approval status
        if ($user->isStorePending() || $user->isStoreRejected()) {
            return redirect()->route('vendor.store-pending');
        }

        if (!$user->isStoreApproved()) {
            return redirect()->route('vendor.store-pending')->with('error', 'يجب الموافقة على متجرك أولاً');
        }

        // Get vendor's products
        $products = Product::where('user_id', $user->id)
            ->with(['category', 'primaryImage'])
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Get statistics
        $stats = [
            'total_products' => Product::where('user_id', $user->id)->count(),
            'active_products' => Product::where('user_id', $user->id)->active()->count(),
            'total_views' => Product::where('user_id', $user->id)->sum('views_count'),
            'store_rating' => $user->store_rating,
        ];

        return view('vendor.profile', compact('user', 'products', 'stats'));
    }

    /**
     * Show edit profile form
     */
    public function editProfile()
    {
        $user = Auth::user();
        
        if (!$user || $user->user_type !== 'vendor') {
            return redirect()->route('home');
        }

        return view('vendor.edit-profile', compact('user'));
    }

    /**
     * Update vendor profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        if (!$user || $user->user_type !== 'vendor') {
            return redirect()->route('home');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'store_name' => ['required', 'string', 'max:255'],
            'store_phone' => ['required', 'string', 'max:20'],
            'store_description' => ['required', 'string', 'max:1000'],
            'store_address' => ['required', 'string', 'max:500'],
        ]);

        $updateData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'store_name' => $request->store_name,
            'store_phone' => $request->store_phone,
            'store_description' => $request->store_description,
            'store_address' => $request->store_address,
        ];

        // If store was rejected, reset to pending status
        if ($user->isStoreRejected()) {
            $updateData['store_status'] = 'pending';
            $updateData['store_submitted_at'] = now();
            $updateData['rejection_reason'] = null;
        }

        $user->update($updateData);

        // Redirect based on store status
        if ($user->isStoreRejected() || $user->isStorePending()) {
            return redirect()->route('vendor.store-pending')->with('success', 'تم إرسال طلب تسجيل المتجر بنجاح!');
        }

        return redirect()->route('vendor.profile')->with('success', 'تم تحديث بيانات المتجر بنجاح');
    }
}
