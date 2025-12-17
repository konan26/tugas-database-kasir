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
       Schema::create('penjualan', function (Blueprint $table) {
    $table->id();
    $table->foreignId('member_id')->nullable()->constrained('members')->nullOnDelete();
    $table->dateTime('tanggal_penjualan');
    $table->integer('total_harga');
    $table->integer('diskon')->default(0);
    $table->integer('total_bayar');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
