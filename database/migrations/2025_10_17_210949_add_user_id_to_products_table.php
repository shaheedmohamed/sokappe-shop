<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add user_id column as alias for vendor_id
            $table->unsignedBigInteger('user_id')->nullable()->after('vendor_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Update existing products to copy vendor_id to user_id
        });
        
        // Update existing records
        DB::statement('UPDATE products SET user_id = vendor_id WHERE vendor_id IS NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
