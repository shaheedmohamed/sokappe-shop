<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'name_ar' => 'الإلكترونيات',
                'description' => 'Phones, laptops, home appliances',
                'description_ar' => 'هواتف، لابتوب، أجهزة منزلية',
                'icon' => 'fas fa-mobile-alt',
                'slug' => 'electronics',
                'sort_order' => 1,
            ],
            [
                'name' => 'Services',
                'name_ar' => 'الخدمات',
                'description' => 'Companies - Equipment - Professional',
                'description_ar' => 'شركات - معدات - مهنية',
                'icon' => 'fas fa-tools',
                'slug' => 'services',
                'sort_order' => 2,
            ],
            [
                'name' => 'Education & Training',
                'name_ar' => 'تدريس وتدريب',
                'description' => 'Children and Students',
                'description_ar' => 'أطفال وطلاب',
                'icon' => 'fas fa-graduation-cap',
                'slug' => 'education',
                'sort_order' => 3,
            ],
            [
                'name' => 'Jobs',
                'name_ar' => 'وظائف',
                'description' => 'Job opportunities',
                'description_ar' => 'فرص عمل',
                'icon' => 'fas fa-briefcase',
                'slug' => 'jobs',
                'sort_order' => 4,
            ],
            [
                'name' => 'Real Estate for Rent',
                'name_ar' => 'عقارات للإيجار',
                'description' => 'Properties for rent',
                'description_ar' => 'عقارات للإيجار',
                'icon' => 'fas fa-home',
                'slug' => 'real-estate-rent',
                'sort_order' => 5,
            ],
            [
                'name' => 'Real Estate for Sale',
                'name_ar' => 'عقارات للبيع',
                'description' => 'Properties for sale',
                'description_ar' => 'عقارات للبيع',
                'icon' => 'fas fa-building',
                'slug' => 'real-estate-sale',
                'sort_order' => 6,
            ],
            [
                'name' => 'Motorcycles',
                'name_ar' => 'دراجات نارية',
                'description' => 'Motorcycles and bikes',
                'description_ar' => 'دراجات نارية وهوائية',
                'icon' => 'fas fa-motorcycle',
                'slug' => 'motorcycles',
                'sort_order' => 7,
            ],
            [
                'name' => 'Vehicles',
                'name_ar' => 'مركبات',
                'description' => 'Cars and vehicles',
                'description_ar' => 'سيارات ومركبات',
                'icon' => 'fas fa-car',
                'slug' => 'vehicles',
                'sort_order' => 8,
            ],
            [
                'name' => 'Stores',
                'name_ar' => 'متاجر',
                'description' => 'Online stores',
                'description_ar' => 'متاجر إلكترونية',
                'icon' => 'fas fa-store',
                'slug' => 'stores',
                'sort_order' => 9,
            ],
            [
                'name' => 'Animals',
                'name_ar' => 'حيوانات',
                'description' => 'Pets and animals',
                'description_ar' => 'حيوانات أليفة',
                'icon' => 'fas fa-paw',
                'slug' => 'animals',
                'sort_order' => 10,
            ],
            [
                'name' => 'Food & Fruits',
                'name_ar' => 'طعام وفواكه',
                'description' => 'Food and fruits',
                'description_ar' => 'طعام وفواكه',
                'icon' => 'fas fa-apple-alt',
                'slug' => 'food-fruits',
                'sort_order' => 11,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        // Create some subcategories for Electronics
        $electronics = Category::where('slug', 'electronics')->first();
        
        $subcategories = [
            [
                'name' => 'Smartphones',
                'name_ar' => 'الهواتف الذكية',
                'description' => 'Mobile phones and smartphones',
                'description_ar' => 'الهواتف المحمولة والذكية',
                'icon' => 'fas fa-mobile-alt',
                'slug' => 'smartphones',
                'parent_id' => $electronics->id,
                'sort_order' => 1,
            ],
            [
                'name' => 'Laptops',
                'name_ar' => 'أجهزة الكمبيوتر المحمولة',
                'description' => 'Laptops and notebooks',
                'description_ar' => 'أجهزة الكمبيوتر المحمولة والنوت بوك',
                'icon' => 'fas fa-laptop',
                'slug' => 'laptops',
                'parent_id' => $electronics->id,
                'sort_order' => 2,
            ],
            [
                'name' => 'Headphones',
                'name_ar' => 'سماعات الرأس',
                'description' => 'Headphones and earphones',
                'description_ar' => 'سماعات الرأس والأذن',
                'icon' => 'fas fa-headphones',
                'slug' => 'headphones',
                'parent_id' => $electronics->id,
                'sort_order' => 3,
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Category::updateOrCreate(
                ['slug' => $subcategory['slug']],
                $subcategory
            );
        }
    }
}
