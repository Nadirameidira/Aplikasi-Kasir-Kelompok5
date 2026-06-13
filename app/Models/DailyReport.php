<?php

namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;

    protected $table = 'daily_reports';

    protected $fillable = [
        'customer_id',
        'total_amount',
        'status'
    ];

    // Relasi ke model Customer (Karena 1 laporan harian dimiliki oleh 1 customer)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}