<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
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
});

// Vendor routes (public)
Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
Route::get('/vendors/{vendor}', [VendorController::class, 'show'])->name('vendors.show');

// Additional routes for future implementation
Route::get('/offers', function () {
    return view('offers.index');
})->name('offers.index');
