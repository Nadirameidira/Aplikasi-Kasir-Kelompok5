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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama produk (Makanan/Minuman/Alat Tulis)
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Menghubungkan ke tabel kategori temanmu
        $table->integer('stock')->default(0); // Stok barang
        $table->decimal('price', 10, 2); // Harga barang
        $table->timestamps();
    });
}
};
