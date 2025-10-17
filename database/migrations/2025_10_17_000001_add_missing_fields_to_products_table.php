<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add missing fields that are used in the form but not in the original migration
            $table->string('brand')->nullable()->after('featured_image');
            $table->string('color')->nullable()->after('brand');
            $table->string('unit')->nullable()->after('color');
            $table->string('size')->nullable()->after('unit');
            $table->unsignedBigInteger('subcategory_id')->nullable()->after('category_id');
            $table->integer('minimum_order_quantity')->default(1)->after('min_stock_level');
            $table->json('seo_keywords')->nullable()->after('meta_description');
            
            // Add foreign key for subcategory
            $table->foreign('subcategory_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['subcategory_id']);
            $table->dropColumn([
                'brand',
                'color', 
                'unit',
                'size',
                'subcategory_id',
                'minimum_order_quantity',
                'seo_keywords'
            ]);
        });
    }
};
