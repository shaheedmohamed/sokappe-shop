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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('user_type', ['customer', 'vendor'])->default('customer')->after('email_verified_at');
            $table->string('phone')->nullable()->after('user_type');
            $table->string('governorate')->nullable()->after('phone');
            $table->string('city')->nullable()->after('governorate');
            
            // Store/Vendor specific fields
            $table->string('store_name')->nullable()->after('city');
            $table->string('store_phone')->nullable()->after('store_name');
            $table->text('store_description')->nullable()->after('store_phone');
            $table->string('store_address')->nullable()->after('store_description');
            $table->decimal('store_latitude', 10, 8)->nullable()->after('store_address');
            $table->decimal('store_longitude', 11, 8)->nullable()->after('store_latitude');
            $table->string('store_logo')->nullable()->after('store_longitude');
            $table->string('store_cover')->nullable()->after('store_logo');
            $table->boolean('store_verified')->default(false)->after('store_cover');
            $table->decimal('store_rating', 3, 2)->default(0)->after('store_verified');
            $table->integer('store_reviews_count')->default(0)->after('store_rating');
            
            // Registration completion tracking
            $table->boolean('registration_completed')->default(false)->after('store_reviews_count');
            $table->timestamp('store_created_at')->nullable()->after('registration_completed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
