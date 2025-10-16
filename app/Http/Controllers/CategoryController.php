<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index(Request $request)
    {
        $categories = Category::where('is_active', true)
            ->where('parent_id', null)
            ->orderBy('sort_order')
            ->get();

        // Build products query with filters
        $productsQuery = Product::where('is_active', true)
            ->with(['category']);

        // Apply filters
        if ($request->filled('category_id')) {
            $productsQuery->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $productsQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('name_ar', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('description_ar', 'like', "%{$search}%");
            });
        }

        if ($request->filled('min_price')) {
            $productsQuery->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $productsQuery->where('price', '<=', $request->max_price);
        }

        $products = $productsQuery->orderBy('created_at', 'desc')->paginate(20);

        return view('categories.index', compact('categories', 'products'));
    }

    /**
     * Display the specified category and its products.
     */
    public function show(Category $category, Request $request)
    {
        // Get subcategories if any
        $subcategories = $category->children()
            ->active()
            ->withCount('products')
            ->orderBy('sort_order')
            ->get();

        // Build products query
        $productsQuery = Product::active()
            ->with(['user', 'category', 'primaryImage']);

        // If category has subcategories, show products from all subcategories
        if ($subcategories->count() > 0) {
            $categoryIds = $subcategories->pluck('id')->push($category->id);
            $productsQuery->whereIn('category_id', $categoryIds);
        } else {
            $productsQuery->where('category_id', $category->id);
        }

        // Apply filters
        $sortBy = $request->get('sort', 'latest');
        $minPrice = $request->get('min_price');
        $maxPrice = $request->get('max_price');

        if ($minPrice) {
            $productsQuery->where('price', '>=', $minPrice);
        }

        if ($maxPrice) {
            $productsQuery->where('price', '<=', $maxPrice);
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
                $productsQuery->orderBy('views_count', 'desc');
                break;
            case 'featured':
                $productsQuery->orderBy('is_featured', 'desc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
        }

        $products = $productsQuery->paginate(20);

        // Get price range for filters
        $priceRange = Product::active()
            ->where('category_id', $category->id)
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();

        return view('categories.show', compact(
            'category',
            'subcategories',
            'products',
            'priceRange',
            'sortBy',
            'minPrice',
            'maxPrice'
        ));
    }
}
