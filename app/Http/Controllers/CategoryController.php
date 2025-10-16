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
    public function index()
    {
        $categories = Category::active()
            ->main()
            ->withCount('products')
            ->orderBy('sort_order')
            ->get();

        return view('categories.index', compact('categories'));
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
