<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Membuat tabel products di database.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                                 // ID produk (Primary Key)
            $table->string('name');                       // Nama produk (string/varchar)
            $table->integer('stock')->default(0);         // Jumlah stok awal produk (angka)
            $table->timestamps();                         // Kolom otomatis created_at & updated_at
            $table->softDeletes();                        // Kolom otomatis deleted_at untuk fitur Soft Delete 
        });
    }

    /**
     * Reverse the migrations.
     * Menghapus tabel jika migration di-rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};