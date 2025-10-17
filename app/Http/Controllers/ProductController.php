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
            ->with(['category', 'images']);

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
        $product->load(['vendor', 'category', 'images']);

        // Get related products
        $relatedProducts = Product::where('is_active', true)
            ->where('stock_quantity', '>', 0)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with(['category'])
            ->limit(8)
            ->get();

        // Get vendor's other products (if vendor exists)
        $vendorProducts = collect([]);
        if ($product->vendor_id) {
            $vendorProducts = Product::where('is_active', true)
                ->where('stock_quantity', '>', 0)
                ->where('vendor_id', $product->vendor_id)
                ->where('id', '!=', $product->id)
                ->with(['category'])
                ->limit(6)
                ->get();
        }

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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'sku' => 'nullable|string|unique:products,sku',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'minimum_order_quantity' => 'nullable|integer|min:1',
            'brand' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'subcategory_id' => 'nullable|exists:categories,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'seo_keywords' => 'nullable|string',
        ], [
            'name.required' => 'اسم المنتج مطلوب',
            'name.max' => 'اسم المنتج يجب ألا يزيد عن 255 حرف',
            'description.required' => 'وصف المنتج مطلوب',
            'category_id.required' => 'يجب اختيار فئة المنتج',
            'category_id.exists' => 'الفئة المختارة غير صحيحة',
            'price.required' => 'سعر المنتج مطلوب',
            'price.numeric' => 'سعر المنتج يجب أن يكون رقم',
            'price.min' => 'سعر المنتج يجب أن يكون أكبر من أو يساوي صفر',
            'stock_quantity.required' => 'كمية المخزن مطلوبة',
            'minimum_order_quantity.integer' => 'الحد الأدنى لكمية الطلب يجب أن يكون رقم صحيح',
            'minimum_order_quantity.min' => 'الحد الأدنى لكمية الطلب يجب أن يكون على الأقل 1',
        ]);

        try {
            // Handle thumbnail upload
            $thumbnailPath = null;
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('products/thumbnails', 'public');
            }

            // Parse SEO keywords
            $seoKeywords = null;
            if ($request->seo_keywords) {
                $seoKeywords = json_decode($request->seo_keywords, true);
            }

            // Create the product
            $product = Product::create([
                'name' => $request->name,
                'name_ar' => $request->name, // For now, using same name
                'description' => $request->description,
                'description_ar' => $request->description, // For now, using same description
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'stock_quantity' => $request->stock_quantity,
                'minimum_order_quantity' => $request->minimum_order_quantity ?? 1,
                'sku' => $request->sku,
                'brand' => $request->brand,
                'color' => $request->color,
                'unit' => $request->unit,
                'size' => $request->size,
                'featured_image' => $thumbnailPath,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'seo_keywords' => $seoKeywords,
                'user_id' => auth()->id() ?? \App\Models\User::first()?->id ?? 1, // Use current user ID or first user or default to 1
                'is_active' => true,
                'status' => 'published',
                'published_at' => now(),
            ]);

            // Handle additional images
            if ($request->hasFile('additional_images')) {
                $sortOrder = 1;
                foreach ($request->file('additional_images') as $image) {
                    if ($image && $image->isValid()) {
                        $imagePath = $image->store('products/images', 'public');
                        
                        $product->images()->create([
                            'image_path' => $imagePath,
                            'sort_order' => $sortOrder,
                            'is_primary' => false,
                        ]);
                        
                        $sortOrder++;
                    }
                }
            }

            // Create primary image record for thumbnail
            if ($thumbnailPath) {
                $product->images()->create([
                    'image_path' => $thumbnailPath,
                    'sort_order' => 0,
                    'is_primary' => true,
                ]);
            }

            return redirect()->route('products.index')->with('success', 'تم إنشاء المنتج بنجاح!');

        } catch (\Exception $e) {
            \Log::error('Product creation failed: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'request_data' => $request->except(['thumbnail', 'additional_images']),
                'error' => $e->getTraceAsString()
            ]);
            
            // Show detailed error in development
            $errorMessage = 'حدث خطأ أثناء إنشاء المنتج: ' . $e->getMessage();
            if (config('app.debug')) {
                $errorMessage .= ' في السطر: ' . $e->getLine() . ' في الملف: ' . $e->getFile();
            }
            
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
        }
    }
}
