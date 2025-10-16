<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(Request $request)
    {
        $productsQuery = Product::where('is_active', true)
            ->with(['category']);

        // Apply filters
        $categoryId = $request->get('category');
        $sortBy = $request->get('sort', 'latest');
        $minPrice = $request->get('min_price');
        $maxPrice = $request->get('max_price');
        $search = $request->get('search');

        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId);
        }

        if ($minPrice) {
            $productsQuery->where('price', '>=', $minPrice);
        }

        if ($maxPrice) {
            $productsQuery->where('price', '<=', $maxPrice);
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
            case 'featured':
                $productsQuery->where('is_featured', true)->orderBy('created_at', 'desc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
        }

        $products = $productsQuery->paginate(20);

        // Get categories for filter
        $categories = Category::where('is_active', true)->where('parent_id', null)->get();

        // Get price range for filters
        $priceRange = Product::where('is_active', true)
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();

        return view('products.index', compact(
            'products',
            'categories',
            'priceRange',
            'categoryId',
            'sortBy',
            'minPrice',
            'maxPrice',
            'search'
        ));
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        // Increment views count
        $product->increment('views_count');

        // Load relationships
        $product->load(['vendor', 'category', 'reviews.user']);

        // Get related products
        $relatedProducts = Product::active()
            ->inStock()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with(['vendor', 'category'])
            ->limit(8)
            ->get();

        // Get vendor's other products
        $vendorProducts = Product::active()
            ->inStock()
            ->where('vendor_id', $product->vendor_id)
            ->where('id', '!=', $product->id)
            ->with(['vendor', 'category'])
            ->limit(6)
            ->get();

        return view('products.show', compact(
            'product',
            'relatedProducts',
            'vendorProducts'
        ));
    }

    /**
     * Display featured products.
     */
    public function featured()
    {
        $products = Product::active()
            ->featured()
            ->inStock()
            ->with(['vendor', 'category'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('products.featured', compact('products'));
    }

    /**
     * Display products on sale.
     */
    public function onSale()
    {
        $products = Product::active()
            ->inStock()
            ->whereNotNull('sale_price')
            ->whereColumn('sale_price', '<', 'price')
            ->with(['vendor', 'category'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('products.sale', compact('products'));
    }

    /**
     * Show user's favorite products
     */
    public function favorites()
    {
        // For now, return empty favorites page
        // This will be implemented when we add favorites functionality
        return view('products.favorites', [
            'favorites' => collect([])
        ]);
    }

    /**
     * Show create product form
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a new product
     */
    public function store(Request $request)
    {
        // This will be implemented later
        return redirect()->back()->with('success', 'سيتم إضافة هذه الوظيفة قريباً');
    }
}
