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
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->with(['vendor', 'category', 'images'])
            ->limit(8)
            ->get();

        // Get latest products
        $latestProducts = Product::where('is_active', true)
            ->with(['vendor', 'category', 'images'])
            ->orderBy('created_at', 'desc')
            ->limit(12)
            ->get();

        // Statistics
        $stats = [
            'total_products' => Product::where('is_active', true)->count(),
            'total_users' => User::count(),
            'total_categories' => Category::where('is_active', true)->count(),
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
     * Search for products with SEO support.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $categoryId = $request->get('category');
        
        $products = Product::where('is_active', true)
            ->with(['vendor', 'category', 'images'])
            ->when($query, function ($q) use ($query) {
                $q->where(function($subQuery) use ($query) {
                    $subQuery->where('name', 'like', "%{$query}%")
                             ->orWhere('name_ar', 'like', "%{$query}%")
                             ->orWhere('description', 'like', "%{$query}%")
                             ->orWhere('description_ar', 'like', "%{$query}%")
                             ->orWhere('meta_title', 'like', "%{$query}%")
                             ->orWhere('meta_description', 'like', "%{$query}%")
                             ->orWhere('brand', 'like', "%{$query}%")
                             ->orWhere('sku', 'like', "%{$query}%")
                             ->orWhereJsonContains('seo_keywords', $query);
                });
            })
            ->when($categoryId, function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $categories = Category::where('is_active', true)->whereNull('parent_id')->get();

        return view('products.index', compact('products', 'categories', 'query', 'categoryId'));
    }
}
