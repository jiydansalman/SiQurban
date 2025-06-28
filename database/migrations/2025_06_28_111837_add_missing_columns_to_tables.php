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
        // Update packages table jika kolom belum ada
        Schema::table('packages', function (Blueprint $table) {
            if (!Schema::hasColumn('packages', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('image_path');
            }
            if (!Schema::hasColumn('packages', 'specifications')) {
                $table->json('specifications')->nullable()->after('is_active');
            }
        });

        // Update users table jika kolom belum ada
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'full_name')) {
                $table->string('full_name')->nullable()->after('username');
            }
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'profile_photo')) {
                $table->string('profile_photo')->nullable()->after('address');
            }
            if (!Schema::hasColumn('users', 'role_id')) {
                $table->unsignedBigInteger('role_id')->default(2)->after('password');
            }
        });

        // Update savings table untuk kolom yang mungkin belum ada
        Schema::table('savings', function (Blueprint $table) {
            if (!Schema::hasColumn('savings', 'saving_type')) {
                $table->enum('saving_type', ['weekly', 'monthly'])->default('monthly')->after('delivery_address');
            }
            if (!Schema::hasColumn('savings', 'amount_per_period')) {
                $table->decimal('amount_per_period', 15, 2)->default(0)->after('saving_type');
            }
            if (!Schema::hasColumn('savings', 'target_date')) {
                $table->date('target_date')->nullable()->after('amount_per_period');
            }
            if (!Schema::hasColumn('savings', 'total_periods')) {
                $table->integer('total_periods')->default(0)->after('target_date');
            }
            if (!Schema::hasColumn('savings', 'completed_periods')) {
                $table->integer('completed_periods')->default(0)->after('total_periods');
            }
            if (!Schema::hasColumn('savings', 'status')) {
                $table->enum('status', ['active', 'completed', 'cancelled'])->default('active')->after('completed_periods');
            }
        });

        // Create roles table jika belum ada
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('description')->nullable();
                $table->timestamps();
            });

            // Insert default roles
            DB::table('roles')->insert([
                ['id' => 1, 'name' => 'Admin', 'description' => 'Administrator', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'name' => 'User', 'description' => 'Regular User', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback packages table
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['is_active', 'specifications']);
        });

        // Rollback users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['full_name', 'phone', 'address', 'profile_photo', 'role_id']);
        });

        // Rollback savings table
        Schema::table('savings', function (Blueprint $table) {
            $table->dropColumn(['saving_type', 'amount_per_period', 'target_date', 'total_periods', 'completed_periods', 'status']);
        });

        // Drop roles table
        Schema::dropIfExists('roles');
    }
};