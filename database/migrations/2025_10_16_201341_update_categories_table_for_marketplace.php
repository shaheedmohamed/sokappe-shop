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
        Schema::table('categories', function (Blueprint $table) {
            // Add name_en column if it doesn't exist
            if (!Schema::hasColumn('categories', 'name_en')) {
                $table->string('name_en')->nullable()->after('name_ar');
            }
            
            // Add description_en column if it doesn't exist
            if (!Schema::hasColumn('categories', 'description_en')) {
                $table->text('description_en')->nullable()->after('description_ar');
            }
            
            // Make name nullable so we can use name_ar as primary
            $table->string('name')->nullable()->change();
            $table->string('name_ar')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
