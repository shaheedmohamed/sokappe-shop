<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount(['products', 'subcategories'])
            ->orderBy('sort_order')
            ->paginate(20);

        $stats = [
            'total_categories' => Category::count(),
            'active_categories' => Category::where('is_active', true)->count(),
            'total_subcategories' => Subcategory::count(),
            'active_subcategories' => Subcategory::where('is_active', true)->count(),
        ];

        return view('admin.categories.index', compact('categories', 'stats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $category = Category::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'تم إضافة الفئة بنجاح',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $category->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الفئة بنجاح',
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'لا يمكن حذف الفئة لأنها تحتوي على منتجات'
            ]);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف الفئة بنجاح'
        ]);
    }

    /**
     * Get subcategories for a category
     */
    public function subcategories(Category $category)
    {
        $subcategories = $category->subcategories()
            ->withCount('products')
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Store a new subcategory
     */
    public function storeSubcategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $subcategory = $category->subcategories()->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'تم إضافة الفئة الفرعية بنجاح',
            'subcategory' => $subcategory
        ]);
    }

    /**
     * Update a subcategory
     */
    public function updateSubcategory(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $subcategory->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الفئة الفرعية بنجاح',
            'subcategory' => $subcategory
        ]);
    }

    /**
     * Delete a subcategory
     */
    public function destroySubcategory(Subcategory $subcategory)
    {
        if ($subcategory->products()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'لا يمكن حذف الفئة الفرعية لأنها تحتوي على منتجات'
            ]);
        }

        $subcategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف الفئة الفرعية بنجاح'
        ]);
    }
}
