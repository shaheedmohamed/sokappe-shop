<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StoreApprovalController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\VendorStoreStatusController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/favorites', [ProductController::class, 'favorites'])->name('products.favorites');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration routes (multi-step)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/register/choose-type', [RegisterController::class, 'showChooseType'])->name('register.choose-type');
Route::post('/register/choose-type', [RegisterController::class, 'chooseType']);
Route::get('/register/store-setup', [RegisterController::class, 'showStoreSetup'])->name('register.store-setup');
Route::post('/register/store-setup', [RegisterController::class, 'storeSetup']);

// Vendor routes
Route::middleware('auth')->group(function () {
    Route::get('/vendor/profile', [VendorController::class, 'profile'])->name('vendor.profile');
    Route::get('/vendor/profile/edit', [VendorController::class, 'editProfile'])->name('vendor.edit-profile');
    Route::put('/vendor/profile', [VendorController::class, 'updateProfile'])->name('vendor.update-profile');
    Route::get('/vendor/store-pending', [VendorStoreStatusController::class, 'storePending'])->name('vendor.store-pending');
});

// Vendor routes (public)
Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
Route::get('/vendors/{vendor}', [VendorController::class, 'show'])->name('vendors.show');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile.index');
});

// Orders routes
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

// Settings routes
Route::middleware('auth')->group(function () {
    Route::get('/settings', function () {
        return view('settings.index');
    })->name('settings.index');
});

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');
    
    // Subcategories management page
    Route::get('/subcategories', [AdminCategoryController::class, 'subcategoriesIndex'])->name('subcategories');
    
    // Subcategory routes
    Route::get('/categories/{category}/subcategories', [AdminCategoryController::class, 'subcategories'])->name('categories.subcategories');
    Route::post('/categories/{category}/subcategories', [AdminCategoryController::class, 'storeSubcategory'])->name('categories.subcategories.store');
    Route::put('/subcategories/{subcategory}', [AdminCategoryController::class, 'updateSubcategory'])->name('subcategories.update');
    Route::delete('/subcategories/{subcategory}', [AdminCategoryController::class, 'destroySubcategory'])->name('subcategories.destroy');
    Route::get('/vendors', [AdminController::class, 'vendors'])->name('vendors');
    Route::get('/vendors/rejected', [AdminController::class, 'rejectedVendors'])->name('vendors.rejected');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::get('/logs', [AdminController::class, 'logs'])->name('logs');
    
    // Store approval routes
    Route::get('/store-approvals', [StoreApprovalController::class, 'index'])->name('store-approvals');
    Route::get('/store-approvals/rejected', [StoreApprovalController::class, 'rejected'])->name('store-approvals.rejected');
    Route::get('/store-approvals/{user}', [StoreApprovalController::class, 'show'])->name('store-approvals.show');
    Route::post('/store-approvals/{user}/approve', [StoreApprovalController::class, 'approve'])->name('store-approvals.approve');
    Route::post('/store-approvals/{user}/reject', [StoreApprovalController::class, 'reject'])->name('store-approvals.reject');
    
    // Bulk actions
    Route::post('/store-approvals/bulk-approve', [StoreApprovalController::class, 'bulkApprove'])->name('store-approvals.bulk-approve');
    Route::post('/store-approvals/bulk-reject', [StoreApprovalController::class, 'bulkReject'])->name('store-approvals.bulk-reject');
});

// Additional routes for future implementation
Route::get('/offers', function () {
    return view('offers.index');
})->name('offers.index');
