<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('savings', function (Blueprint $table) {
            // Rename qurban_id ke package_id
            // $table->renameColumn('qurban_id', 'package_id');
            
            // Tambah kolom yang belum ada
            if (!Schema::hasColumn('savings', 'delivery_location')) {
                $table->string('delivery_location')->nullable();
            }
            if (!Schema::hasColumn('savings', 'delivery_address')) {
                $table->text('delivery_address')->nullable();
            }
            if (!Schema::hasColumn('savings', 'saving_type')) {
                $table->string('saving_type')->nullable();
            }
            if (!Schema::hasColumn('savings', 'amount_per_period')) {
                $table->decimal('amount_per_period', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('savings', 'target_date')) {
                $table->date('target_date')->nullable();
            }
            if (!Schema::hasColumn('savings', 'total_periods')) {
                $table->integer('total_periods')->nullable();
            }
            if (!Schema::hasColumn('savings', 'completed_periods')) {
                $table->integer('completed_periods')->default(0);
            }
            if (!Schema::hasColumn('savings', 'status')) {
                $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            }
        });
    }

    public function down()
    {
        Schema::table('savings', function (Blueprint $table) {
            $table->renameColumn('package_id', 'qurban_id');
            $table->dropColumn([
                'delivery_location',
                'delivery_address',
                'saving_type',
                'amount_per_period',
                'target_date',
                'total_periods',
                'completed_periods',
                'status'
            ]);
        });
    }
};