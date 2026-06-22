<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Ini ibaratnya kyk kartu paspor biar data dari web diizinkan masuk ke MySQL 
    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'stock',
        'price',
    ];

    // buat produk mengenali data dari tabel kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}