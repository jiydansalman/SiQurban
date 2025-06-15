<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->string('delivery_location'); // Rumah, Masjid
            $table->text('delivery_address');
            $table->string('saving_type'); // weekly, monthly
            $table->decimal('amount_per_period', 10, 2); // jumlah tabungan per periode
            $table->decimal('total_saved', 10, 2)->default(0); // total yang sudah ditabung
            $table->date('target_date'); // tanggal target (Idul Adha 2026)
            $table->integer('total_periods'); // total periode (minggu/bulan)
            $table->integer('completed_periods')->default(0); // periode yang sudah selesai
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('savings');
    }
};
