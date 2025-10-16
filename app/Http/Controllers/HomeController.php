<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        // Get featured categories
        $categories = Category::active()
            ->main()
            ->orderBy('sort_order')
            ->limit(8)
            ->get();

        // Get featured products
        $featuredProducts = Product::active()
            ->featured()
            ->with(['user', 'category', 'primaryImage'])
            ->limit(8)
            ->get();

        // Get latest products
        $latestProducts = Product::active()
            ->with(['user', 'category', 'primaryImage'])
            ->orderBy('created_at', 'desc')
            ->limit(12)
            ->get();

        // Statistics
        $stats = [
            'total_products' => Product::active()->count(),
            'total_users' => User::count(),
            'total_categories' => Category::active()->count(),
            'total_views' => Product::sum('views_count'),
        ];

        return view('welcome', compact(
            'categories',
            'featuredProducts',
            'latestProducts',
            'stats'
        ));
    }

    /**
     * Search for products.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $categoryId = $request->get('category');
        
        $products = Product::active()
            ->with(['user', 'category', 'primaryImage'])
            ->when($query, function ($q) use ($query) {
                $q->where('title_ar', 'like', "%{$query}%")
                  ->orWhere('title_en', 'like', "%{$query}%")
                  ->orWhere('description_ar', 'like', "%{$query}%")
                  ->orWhere('description_en', 'like', "%{$query}%");
            })
            ->when($categoryId, function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })
            ->paginate(20);

        $categories = Category::active()->main()->get();

        return view('search', compact('products', 'categories', 'query', 'categoryId'));
    }
}
