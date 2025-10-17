<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class ProductWithImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get vendors and categories
        $vendors = User::whereNotNull('store_name')->where('store_status', 'approved')->get();
        $categories = Category::all();
        
        if ($vendors->isEmpty()) {
            $this->command->info('No approved vendors found. Creating sample vendor...');
            $vendor = User::create([
                'name' => 'متجر تجريبي',
                'email' => 'vendor@example.com',
                'password' => bcrypt('password'),
                'store_name' => 'المتجر التجريبي',
                'store_description' => 'متجر تجريبي للمنتجات',
                'store_status' => 'approved'
            ]);
            $vendors = collect([$vendor]);
        }
        
        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Please run CategorySeeder first.');
            return;
        }

        $products = [
            [
                'name' => 'iPhone 15 Pro Max',
                'name_ar' => 'آيفون 15 برو ماكس',
                'description' => 'Latest iPhone with advanced features and powerful performance',
                'description_ar' => 'أحدث آيفون بمميزات متقدمة وأداء قوي',
                'price' => 4999.99,
                'sale_price' => 4499.99,
                'stock_quantity' => 25,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=500',
                    'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500'
                ]
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'name_ar' => 'سامسونج جالاكسي إس 24 ألترا',
                'description' => 'Premium Android smartphone with S Pen',
                'description_ar' => 'هاتف أندرويد متميز مع قلم إس',
                'price' => 4299.99,
                'stock_quantity' => 30,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=500',
                    'https://images.unsplash.com/photo-1565849904461-04a58ad377e0?w=500'
                ]
            ],
            [
                'name' => 'MacBook Pro 16"',
                'name_ar' => 'ماك بوك برو 16 بوصة',
                'description' => 'Professional laptop for creative professionals',
                'description_ar' => 'لابتوب احترافي للمبدعين المحترفين',
                'price' => 8999.99,
                'sale_price' => 8499.99,
                'stock_quantity' => 15,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=500',
                    'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=500'
                ]
            ]
