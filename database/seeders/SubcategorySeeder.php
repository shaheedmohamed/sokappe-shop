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
        // Get categories by slug (more reliable)
        $electronics = Category::where('slug', 'electronics')->first();
        $services = Category::where('slug', 'services')->first();
        $education = Category::where('slug', 'education')->first();
        $jobs = Category::where('slug', 'jobs')->first();

        // Electronics subcategories
        if ($electronics) {
            Subcategory::updateOrCreate(
                ['name' => 'هواتف ذكية', 'category_id' => $electronics->id],
                [
                    'name_en' => 'Smartphones',
                    'description' => 'هواتف ذكية وأجهزة محمولة',
                    'icon' => 'fas fa-mobile-alt',
                    'color' => '#3498db',
                    'sort_order' => 1
                ]
            );

            Subcategory::updateOrCreate(
                ['name' => 'أجهزة كمبيوتر', 'category_id' => $electronics->id],
                [
                    'name_en' => 'Computers',
                    'description' => 'أجهزة كمبيوتر ولابتوب',
                    'icon' => 'fas fa-laptop',
                    'color' => '#2c3e50',
                    'sort_order' => 2
                ]
            );

            Subcategory::updateOrCreate(
                ['name' => 'أجهزة منزلية', 'category_id' => $electronics->id],
                [
                    'name_en' => 'Home Appliances',
                    'description' => 'أجهزة كهربائية منزلية',
                    'icon' => 'fas fa-tv',
                    'color' => '#e74c3c',
                    'sort_order' => 3
                ]
            );
        }

        // Services subcategories
        if ($services) {
            Subcategory::updateOrCreate(
                ['name' => 'خدمات تقنية', 'category_id' => $services->id],
                [
                    'name_en' => 'Tech Services',
                    'description' => 'خدمات تقنية ومعلوماتية',
                    'icon' => 'fas fa-laptop-code',
                    'color' => '#3498db',
                    'sort_order' => 1
                ]
            );

            Subcategory::updateOrCreate(
                ['name' => 'خدمات منزلية', 'category_id' => $services->id],
                [
                    'name_en' => 'Home Services',
                    'description' => 'خدمات منزلية وصيانة',
                    'icon' => 'fas fa-home',
                    'color' => '#e74c3c',
                    'sort_order' => 2
                ]
            );

            Subcategory::updateOrCreate(
                ['name' => 'خدمات مهنية', 'category_id' => $services->id],
                [
                    'name_en' => 'Professional Services',
                    'description' => 'خدمات مهنية واستشارية',
                    'icon' => 'fas fa-briefcase',
                    'color' => '#2c3e50',
                    'sort_order' => 3
                ]
            );
        }

        // Education subcategories
        if ($education) {
            Subcategory::updateOrCreate(
                ['name' => 'دروس خصوصية', 'category_id' => $education->id],
                [
                    'name_en' => 'Private Tutoring',
                    'description' => 'دروس خصوصية لجميع المراحل',
                    'icon' => 'fas fa-chalkboard-teacher',
                    'color' => '#9b59b6',
                    'sort_order' => 1
                ]
            );

            Subcategory::updateOrCreate(
                ['name' => 'دورات تدريبية', 'category_id' => $education->id],
                [
                    'name_en' => 'Training Courses',
                    'description' => 'دورات تدريبية متخصصة',
                    'icon' => 'fas fa-graduation-cap',
                    'color' => '#3498db',
                    'sort_order' => 2
                ]
            );
        }

        // Jobs subcategories
        if ($jobs) {
            Subcategory::updateOrCreate(
                ['name' => 'وظائف تقنية', 'category_id' => $jobs->id],
                [
                    'name_en' => 'Tech Jobs',
                    'description' => 'وظائف في مجال التقنية',
                    'icon' => 'fas fa-code',
                    'color' => '#2c3e50',
                    'sort_order' => 1
                ]
            );

            Subcategory::updateOrCreate(
                ['name' => 'وظائف إدارية', 'category_id' => $jobs->id],
                [
                    'name_en' => 'Administrative Jobs',
                    'description' => 'وظائف إدارية ومكتبية',
                    'icon' => 'fas fa-briefcase',
                    'color' => '#34495e',
                    'sort_order' => 2
                ]
            );
        }
    }
}
