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
        Schema::table('packages', function (Blueprint $table) {
            // Add is_active field if it doesn't exist
            if (!Schema::hasColumn('packages', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('image_path');
            }
            
            // Add specifications field for extra package details
            if (!Schema::hasColumn('packages', 'specifications')) {
                $table->json('specifications')->nullable()->after('is_active');
            }
            
            // Add indexes for better performance
            $table->index(['type', 'is_active']);
            $table->index('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropIndex(['type', 'is_active']);
            $table->dropIndex(['price']);
            $table->dropColumn(['is_active', 'specifications']);
        });
    }
};