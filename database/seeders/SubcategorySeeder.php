<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $electronics = Category::where('name', 'إلكترونيات')->first();
        $fashion = Category::where('name', 'أزياء')->first();
        $home = Category::where('name', 'منزل وحديقة')->first();
        $sports = Category::where('name', 'رياضة ولياقة')->first();

        // Electronics subcategories
        if ($electronics) {
            Subcategory::create([
                'name' => 'هواتف ذكية',
                'name_en' => 'Smartphones',
                'description' => 'هواتف ذكية وأجهزة محمولة',
                'icon' => 'fas fa-mobile-alt',
                'color' => '#3498db',
                'category_id' => $electronics->id,
                'sort_order' => 1
            ]);

            Subcategory::create([
                'name' => 'أجهزة كمبيوتر',
                'name_en' => 'Computers',
                'description' => 'أجهزة كمبيوتر ولابتوب',
                'icon' => 'fas fa-laptop',
                'color' => '#2c3e50',
                'category_id' => $electronics->id,
                'sort_order' => 2
            ]);

            Subcategory::create([
                'name' => 'أجهزة منزلية',
                'name_en' => 'Home Appliances',
                'description' => 'أجهزة كهربائية منزلية',
                'icon' => 'fas fa-tv',
                'color' => '#e74c3c',
                'category_id' => $electronics->id,
                'sort_order' => 3
            ]);
        }

        // Fashion subcategories
        if ($fashion) {
            Subcategory::create([
                'name' => 'ملابس رجالي',
                'name_en' => 'Men\'s Clothing',
                'description' => 'ملابس وأزياء رجالية',
                'icon' => 'fas fa-tshirt',
                'color' => '#34495e',
                'category_id' => $fashion->id,
                'sort_order' => 1
            ]);

            Subcategory::create([
                'name' => 'ملابس نسائي',
                'name_en' => 'Women\'s Clothing',
                'description' => 'ملابس وأزياء نسائية',
                'icon' => 'fas fa-female',
                'color' => '#e91e63',
                'category_id' => $fashion->id,
                'sort_order' => 2
            ]);

            Subcategory::create([
                'name' => 'أحذية',
                'name_en' => 'Shoes',
                'description' => 'أحذية رجالي ونسائي',
                'icon' => 'fas fa-shoe-prints',
                'color' => '#8b4513',
                'category_id' => $fashion->id,
                'sort_order' => 3
            ]);
        }

        // Home subcategories
        if ($home) {
            Subcategory::create([
                'name' => 'أثاث',
                'name_en' => 'Furniture',
                'description' => 'أثاث منزلي ومكتبي',
                'icon' => 'fas fa-couch',
                'color' => '#d2691e',
                'category_id' => $home->id,
                'sort_order' => 1
            ]);

            Subcategory::create([
                'name' => 'ديكور',
                'name_en' => 'Decoration',
                'description' => 'ديكورات وإكسسوارات منزلية',
                'icon' => 'fas fa-palette',
                'color' => '#ff6b6b',
                'category_id' => $home->id,
                'sort_order' => 2
            ]);
        }

        // Sports subcategories
        if ($sports) {
            Subcategory::create([
                'name' => 'معدات رياضية',
                'name_en' => 'Sports Equipment',
                'description' => 'معدات وأدوات رياضية',
                'icon' => 'fas fa-dumbbell',
                'color' => '#f39c12',
                'category_id' => $sports->id,
                'sort_order' => 1
            ]);

            Subcategory::create([
                'name' => 'ملابس رياضية',
                'name_en' => 'Sportswear',
                'description' => 'ملابس وأحذية رياضية',
                'icon' => 'fas fa-running',
                'color' => '#27ae60',
                'category_id' => $sports->id,
                'sort_order' => 2
            ]);
        }
    }
}
