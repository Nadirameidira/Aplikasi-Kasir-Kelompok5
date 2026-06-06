<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'price', 'subtotal'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    //ini buat fitur stock otomatis ketika transaksi dibuat atau dihapus
    protected static function booted()
    {
    
        static::created(function ($detail) {
            $product = $detail->product;
            if ($product) {
                $product->decrement('stock', $detail->quantity);
            }
        });

        static::deleted(function ($detail) {
            $product = $detail->product;
            if ($product) {
                $product->increment('stock', $detail->quantity);
            }
        });
    }
}