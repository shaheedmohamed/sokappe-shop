<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Vendor;
use Illuminate\Support\Str;

class ProductsSeeder30 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get vendors and categories
        $vendors = Vendor::where('is_active', true)->get();
        $categories = Category::all();
        
        if ($vendors->isEmpty()) {
            $this->command->info('No vendors found. Creating sample vendors...');
            
            // Create sample users first
            $users = [];
            for ($i = 1; $i <= 3; $i++) {
                $user = User::create([
                    'name' => "متجر تجريبي {$i}",
                    'email' => "vendor{$i}@example.com",
                    'password' => bcrypt('password'),
                    'store_name' => "المتجر التجريبي {$i}",
                    'store_description' => "متجر تجريبي للمنتجات {$i}",
                    'store_status' => 'approved'
                ]);
                $users[] = $user;
            }
            
            // Create vendors
            foreach ($users as $user) {
                $vendor = Vendor::create([
                    'user_id' => $user->id,
                    'store_name' => $user->store_name,
                    'description' => $user->store_description,
                    'is_verified' => true,
                    'is_active' => true
                ]);
                $vendors[] = $vendor;
            }
            $vendors = collect($vendors);
        }
        
        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Please run CategorySeeder first.');
            return;
        }

        $products = [
            [
                'name' => 'iPhone 15 Pro Max',
                'name_ar' => 'آيفون 15 برو ماكس',
                'description' => 'Latest iPhone with advanced features',
                'description_ar' => 'أحدث آيفون بمميزات متقدمة',
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
                'name' => 'Samsung Galaxy S24',
                'name_ar' => 'سامسونج جالاكسي إس 24',
                'description' => 'Premium Android smartphone',
                'description_ar' => 'هاتف أندرويد متميز',
                'price' => 3999.99,
                'stock_quantity' => 30,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=500'
                ]
            ],
            [
                'name' => 'MacBook Pro 16"',
                'name_ar' => 'ماك بوك برو 16 بوصة',
                'description' => 'Professional laptop',
                'description_ar' => 'لابتوب احترافي',
                'price' => 8999.99,
                'stock_quantity' => 15,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=500'
                ]
            ],
            [
                'name' => 'AirPods Pro',
                'name_ar' => 'إيربودز برو',
                'description' => 'Wireless earbuds with noise cancellation',
                'description_ar' => 'سماعات لاسلكية مع إلغاء الضوضاء',
                'price' => 899.99,
                'stock_quantity' => 50,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?w=500'
                ]
            ],
            [
                'name' => 'iPad Air',
                'name_ar' => 'آيباد إير',
                'description' => 'Lightweight tablet for work and play',
                'description_ar' => 'تابلت خفيف للعمل واللعب',
                'price' => 2299.99,
                'stock_quantity' => 20,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=500'
                ]
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'name_ar' => 'سوني دبليو إتش 1000 إكس إم 5',
                'description' => 'Premium noise-canceling headphones',
                'description_ar' => 'سماعات رأس متميزة مع إلغاء الضوضاء',
                'price' => 1299.99,
                'stock_quantity' => 35,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1583394838336-acd977736f90?w=500'
                ]
            ],
            [
                'name' => 'Dell XPS 13',
                'name_ar' => 'ديل إكس بي إس 13',
                'description' => 'Ultra-portable laptop',
                'description_ar' => 'لابتوب فائق الحمولة',
                'price' => 4599.99,
                'stock_quantity' => 18,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=500'
                ]
            ],
            [
                'name' => 'Nintendo Switch',
                'name_ar' => 'نينتندو سويتش',
                'description' => 'Hybrid gaming console',
                'description_ar' => 'جهاز ألعاب هجين',
                'price' => 1199.99,
                'stock_quantity' => 40,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=500'
                ]
            ],
            [
                'name' => 'Canon EOS R5',
                'name_ar' => 'كانون إي أو إس آر 5',
                'description' => 'Professional mirrorless camera',
                'description_ar' => 'كاميرا احترافية بدون مرآة',
                'price' => 12999.99,
                'stock_quantity' => 8,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=500'
                ]
            ],
            [
                'name' => 'Apple Watch Series 9',
                'name_ar' => 'أبل واتش سيريز 9',
                'description' => 'Advanced smartwatch',
                'description_ar' => 'ساعة ذكية متقدمة',
                'price' => 1599.99,
                'stock_quantity' => 45,
                'category' => 'Electronics',
                'images' => [
                    'https://images.unsplash.com/photo-1551816230-ef5deaed4a26?w=500'
                ]
            ]
        ];

        // Add more products to reach 30
        $additionalProducts = [
            ['name' => 'Gaming Chair Pro', 'name_ar' => 'كرسي ألعاب برو', 'price' => 899.99, 'category' => 'Services'],
            ['name' => 'Wireless Mouse', 'name_ar' => 'فأرة لاسلكية', 'price' => 199.99, 'category' => 'Electronics'],
            ['name' => 'Mechanical Keyboard', 'name_ar' => 'لوحة مفاتيح ميكانيكية', 'price' => 399.99, 'category' => 'Electronics'],
            ['name' => 'USB-C Hub', 'name_ar' => 'موزع يو إس بي سي', 'price' => 299.99, 'category' => 'Electronics'],
            ['name' => 'Portable SSD 1TB', 'name_ar' => 'قرص صلب محمول 1 تيرا', 'price' => 599.99, 'category' => 'Electronics'],
            ['name' => 'Wireless Charger', 'name_ar' => 'شاحن لاسلكي', 'price' => 149.99, 'category' => 'Electronics'],
            ['name' => 'Bluetooth Speaker', 'name_ar' => 'سماعة بلوتوث', 'price' => 249.99, 'category' => 'Electronics'],
            ['name' => 'Phone Case Premium', 'name_ar' => 'جراب هاتف مميز', 'price' => 99.99, 'category' => 'Electronics'],
            ['name' => 'Screen Protector', 'name_ar' => 'واقي شاشة', 'price' => 49.99, 'category' => 'Electronics'],
            ['name' => 'Power Bank 20000mAh', 'name_ar' => 'بطارية محمولة 20000 مللي أمبير', 'price' => 199.99, 'category' => 'Electronics'],
            ['name' => 'Car Phone Mount', 'name_ar' => 'حامل هاتف للسيارة', 'price' => 79.99, 'category' => 'Electronics'],
            ['name' => 'LED Desk Lamp', 'name_ar' => 'مصباح مكتب ليد', 'price' => 129.99, 'category' => 'Electronics'],
            ['name' => 'Webcam HD', 'name_ar' => 'كاميرا ويب عالية الدقة', 'price' => 299.99, 'category' => 'Electronics'],
            ['name' => 'Microphone USB', 'name_ar' => 'ميكروفون يو إس بي', 'price' => 199.99, 'category' => 'Electronics'],
            ['name' => 'Cable Organizer', 'name_ar' => 'منظم الكابلات', 'price' => 39.99, 'category' => 'Electronics'],
            ['name' => 'Laptop Stand', 'name_ar' => 'حامل لابتوب', 'price' => 149.99, 'category' => 'Electronics'],
            ['name' => 'Monitor 27 inch', 'name_ar' => 'شاشة 27 بوصة', 'price' => 1299.99, 'category' => 'Electronics'],
            ['name' => 'Graphics Tablet', 'name_ar' => 'تابلت رسم', 'price' => 799.99, 'category' => 'Electronics'],
            ['name' => 'VR Headset', 'name_ar' => 'نظارة واقع افتراضي', 'price' => 1999.99, 'category' => 'Electronics'],
            ['name' => 'Smart Home Hub', 'name_ar' => 'مركز المنزل الذكي', 'price' => 499.99, 'category' => 'Electronics']
        ];

        // Merge arrays
        $allProducts = array_merge($products, $additionalProducts);

        foreach ($allProducts as $index => $productData) {
            $vendor = $vendors->random();
            $category = $categories->where('name', $productData['category'])->first() 
                       ?? $categories->first();

            $product = Product::create([
                'vendor_id' => $vendor->id,
                'user_id' => $vendor->user_id,
                'category_id' => $category->id,
                'name' => $productData['name'],
                'name_ar' => $productData['name_ar'] ?? $productData['name'],
                'description' => $productData['description'] ?? 'High quality product',
                'description_ar' => $productData['description_ar'] ?? 'منتج عالي الجودة',
                'short_description' => Str::limit($productData['description'] ?? 'Great product', 100),
                'sku' => 'SKU-' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'price' => $productData['price'],
                'sale_price' => $productData['sale_price'] ?? null,
                'stock_quantity' => $productData['stock_quantity'] ?? rand(10, 50),
                'min_stock_level' => 5,
                'weight' => rand(100, 2000) / 100,
                'images' => json_encode($productData['images'] ?? [
                    'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500',
                    'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=500'
                ]),
                'featured_image' => $productData['images'][0] ?? 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500',
                'slug' => Str::slug($productData['name']) . '-' . ($index + 1),
                'meta_title' => $productData['name'],
                'meta_description' => Str::limit($productData['description'] ?? 'Great product', 160),
                'is_active' => true,
                'is_featured' => rand(0, 1) == 1,
                'status' => 'published',
                'published_at' => now(),
                'brand' => ['Apple', 'Samsung', 'Sony', 'Dell', 'Canon', 'Nintendo'][rand(0, 5)],
                'color' => ['أسود', 'أبيض', 'فضي', 'ذهبي', 'أزرق'][rand(0, 4)],
                'unit' => 'قطعة'
            ]);

            // Create product images
            if (isset($productData['images'])) {
                foreach ($productData['images'] as $imageIndex => $imageUrl) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imageUrl,
                        'alt_text' => $product->name . ' - صورة ' . ($imageIndex + 1),
                        'sort_order' => $imageIndex + 1,
                        'is_primary' => $imageIndex === 0
                    ]);
                }
            }

            $this->command->info("تم إنشاء المنتج: {$product->name}");
        }

        $this->command->info('تم إنشاء 30 منتج بنجاح مع الصور!');
    }
}
