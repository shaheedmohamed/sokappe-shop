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
            $table->enum('store_status', ['pending', 'approved', 'rejected'])->default('pending')->after('store_name');
            $table->text('rejection_reason')->nullable()->after('store_status');
            $table->timestamp('store_approved_at')->nullable()->after('rejection_reason');
            $table->timestamp('store_submitted_at')->nullable()->after('store_approved_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['store_status', 'rejection_reason', 'store_approved_at', 'store_submitted_at']);
        });
    }
};
