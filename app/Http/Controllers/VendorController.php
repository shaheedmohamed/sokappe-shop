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
    public function index(Request $request)
    {
        $vendorsQuery = User::where('user_type', 'vendor')
            ->where('registration_completed', true)
            ->where('store_verified', true)
            ->withCount('products');

        // Apply filters
        $sortBy = $request->get('sort', 'rating');
        $search = $request->get('search');
        $city = $request->get('city');

        if ($search) {
            $vendorsQuery->where(function ($q) use ($search) {
                $q->where('store_name', 'like', "%{$search}%")
                  ->orWhere('store_name_ar', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('description_ar', 'like', "%{$search}%");
            });
        }

        if ($city) {
            $vendorsQuery->where('city', $city);
        }

        // Apply sorting
        switch ($sortBy) {
            case 'name':
                $vendorsQuery->orderBy('store_name', 'asc');
                break;
            case 'products':
                $vendorsQuery->orderBy('products_count', 'desc');
                break;
            case 'sales':
                $vendorsQuery->orderBy('total_sales', 'desc');
                break;
            case 'newest':
                $vendorsQuery->orderBy('joined_at', 'desc');
                break;
            default:
                $vendorsQuery->orderBy('rating', 'desc');
        }

        $vendors = $vendorsQuery->paginate(20);

        // Get cities for filter
        $cities = Vendor::active()
            ->verified()
            ->distinct()
            ->pluck('city')
            ->filter()
            ->sort()
            ->values();

        return view('vendors.index', compact(
            'vendors',
            'cities',
            'sortBy',
            'search',
            'city'
        ));
    }

    /**
     * Display the specified vendor.
     */
    public function show(Vendor $vendor, Request $request)
    {
        // Check if vendor is active and verified
        if (!$vendor->is_active || !$vendor->is_verified) {
            abort(404);
        }

        // Get vendor's products
        $productsQuery = Product::active()
            ->inStock()
            ->where('vendor_id', $vendor->id)
            ->with(['category']);

        // Apply filters
        $categoryId = $request->get('category');
        $sortBy = $request->get('sort', 'latest');
        $search = $request->get('search');

        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId);
        }

        if ($search) {
            $productsQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('name_ar', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('description_ar', 'like', "%{$search}%");
            });
        }

        // Apply sorting
        switch ($sortBy) {
            case 'price_low':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_high':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'popular':
                $productsQuery->orderBy('sales_count', 'desc');
                break;
            case 'rating':
                $productsQuery->orderBy('rating', 'desc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
        }

        $products = $productsQuery->paginate(20);

        // Get categories for this vendor's products
        $categories = Product::active()
            ->where('vendor_id', $vendor->id)
            ->with('category')
            ->get()
            ->pluck('category')
            ->unique('id')
            ->values();

        // Get vendor statistics
        $stats = [
            'total_products' => $vendor->products()->active()->count(),
            'total_sales' => $vendor->total_sales,
            'average_rating' => $vendor->average_rating,
            'joined_date' => $vendor->joined_at,
        ];

        return view('vendors.show', compact(
            'vendor',
            'products',
            'categories',
            'stats',
            'categoryId',
            'sortBy',
            'search'
        ));
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

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'store_name' => $request->store_name,
            'store_phone' => $request->store_phone,
            'store_description' => $request->store_description,
            'store_address' => $request->store_address,
        ]);

        return redirect()->route('vendor.profile')->with('success', 'تم تحديث بيانات المتجر بنجاح');
    }
}
