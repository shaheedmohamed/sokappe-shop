<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Support\Str;

class AdditionalProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get vendor users and categories
        $categories = Category::all();
        
        // Get vendor users (users with user_type = 'vendor')
        $vendorUsers = User::where('user_type', 'vendor')->get();
        if ($vendorUsers->count() == 0) {
            // If no vendor users exist, use any user
            $vendorUsers = User::take(5)->get();
        }
        
        $additionalProducts = [
            // Electronics
            ['name_ar' => 'سماعات بلوتوث لاسلكية', 'name' => 'Wireless Bluetooth Headphones', 'price' => 450, 'category' => 'الإلكترونيات'],
            ['name_ar' => 'شاحن محمول 20000 مللي أمبير', 'name' => 'Power Bank 20000mAh', 'price' => 280, 'category' => 'الإلكترونيات'],
            ['name_ar' => 'كاميرا رقمية كانون', 'name' => 'Canon Digital Camera', 'price' => 8500, 'category' => 'الإلكترونيات'],
            ['name_ar' => 'ساعة ذكية أبل واتش', 'name' => 'Apple Watch Smart Watch', 'price' => 12000, 'category' => 'الإلكترونيات'],
            ['name_ar' => 'تابلت سامسونج جالاكسي', 'name' => 'Samsung Galaxy Tablet', 'price' => 6500, 'category' => 'الإلكترونيات'],
            
            // Services
            ['name_ar' => 'دورة تصميم جرافيك متقدمة', 'name' => 'Advanced Graphic Design Course', 'price' => 1200, 'category' => 'تدريس وتدريب'],
            ['name_ar' => 'خدمة صيانة أجهزة كمبيوتر', 'name' => 'Computer Repair Service', 'price' => 200, 'category' => 'الخدمات'],
            ['name_ar' => 'جلسة تصوير فوتوغرافي', 'name' => 'Photography Session', 'price' => 800, 'category' => 'الخدمات'],
            ['name_ar' => 'خدمة تنظيف منازل', 'name' => 'House Cleaning Service', 'price' => 150, 'category' => 'الخدمات'],
            ['name_ar' => 'دروس خصوصية رياضيات', 'name' => 'Private Math Tutoring', 'price' => 100, 'category' => 'تدريس وتدريب'],
            
            // Vehicles
            ['name_ar' => 'سيارة تويوتا كورولا 2020', 'name' => 'Toyota Corolla 2020', 'price' => 320000, 'category' => 'مركبات'],
            ['name_ar' => 'دراجة نارية هوندا', 'name' => 'Honda Motorcycle', 'price' => 25000, 'category' => 'دراجات نارية'],
            ['name_ar' => 'دراجة هوائية جبلية', 'name' => 'Mountain Bicycle', 'price' => 2800, 'category' => 'دراجات نارية'],
            ['name_ar' => 'سيارة نيسان صني 2019', 'name' => 'Nissan Sunny 2019', 'price' => 280000, 'category' => 'مركبات'],
            ['name_ar' => 'إطارات سيارة ميشلان', 'name' => 'Michelin Car Tires', 'price' => 1800, 'category' => 'مركبات'],
            
            // Food & Fruits
            ['name_ar' => 'عسل نحل طبيعي', 'name' => 'Natural Honey', 'price' => 120, 'category' => 'طعام وفواكه'],
            ['name_ar' => 'تمر مجدول فاخر', 'name' => 'Premium Medjool Dates', 'price' => 80, 'category' => 'طعام وفواكه'],
            ['name_ar' => 'زيت زيتون بكر ممتاز', 'name' => 'Extra Virgin Olive Oil', 'price' => 150, 'category' => 'طعام وفواكه'],
            ['name_ar' => 'حلويات شرقية متنوعة', 'name' => 'Assorted Oriental Sweets', 'price' => 200, 'category' => 'طعام وفواكه'],
            ['name_ar' => 'قهوة عربية فاخرة', 'name' => 'Premium Arabic Coffee', 'price' => 90, 'category' => 'طعام وفواكه'],
        ];
        
        foreach ($additionalProducts as $index => $productData) {
            // Get random vendor user and category
            $vendorUser = $vendorUsers->random();
            $category = $categories->where('name', $productData['category'])->first() 
                       ?? $categories->first();
            
            // Check if products table structure matches
            try {
                Product::create([
                    'user_id' => $vendorUser->id,
                    'category_id' => $category->id,
                    'name' => $productData['name'],
                    'name_ar' => $productData['name_ar'],
                    'description' => 'وصف تفصيلي للمنتج ' . $productData['name_ar'],
                    'description_ar' => 'وصف تفصيلي للمنتج ' . $productData['name_ar'],
                    'sku' => 'SKU-' . strtoupper(Str::random(8)),
                    'price' => $productData['price'],
                    'sale_price' => rand(0, 1) ? $productData['price'] + rand(100, 500) : null,
                    'slug' => Str::slug($productData['name_ar']) . '-' . Str::random(6),
                    'is_active' => true,
                    'is_featured' => rand(0, 1),
                    'views_count' => rand(10, 200),
                ]);
            } catch (\Exception $e) {
                // If user_id doesn't exist, try with vendor_id from vendors table
                $vendor = Vendor::first();
                if ($vendor) {
                    Product::create([
                        'vendor_id' => $vendor->id,
                        'category_id' => $category->id,
                        'name' => $productData['name'],
                        'name_ar' => $productData['name_ar'],
                        'description' => 'وصف تفصيلي للمنتج ' . $productData['name_ar'],
                        'description_ar' => 'وصف تفصيلي للمنتج ' . $productData['name_ar'],
                        'sku' => 'SKU-' . strtoupper(Str::random(8)),
                        'price' => $productData['price'],
                        'sale_price' => rand(0, 1) ? $productData['price'] + rand(100, 500) : null,
                        'slug' => Str::slug($productData['name_ar']) . '-' . Str::random(6),
                        'is_active' => true,
                        'is_featured' => rand(0, 1),
                        'views_count' => rand(10, 200),
                    ]);
                }
            }
        }
    }
}
