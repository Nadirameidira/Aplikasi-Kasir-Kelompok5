<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'user_id',
        'shift_start',
        'shift_end',
        'starting_balance',
        'ending_balance',
        'total_revenue',
        'total_transactions',
        'status',
        'notes',
    ];

    protected $casts = [
        'shift_start' => 'datetime',
        'shift_end' => 'datetime',
        'starting_balance' => 'decimal:2',
        'ending_balance' => 'decimal:2',
        'total_revenue' => 'decimal:2',
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function isOpen()
    {
        return $this->status === 'open';
    }

     public function closeShift($endingBalance, $revenue, $totalTransactions)
    {
        $this->update([
            'shift_end' => now(),
            'ending_balance' => $endingBalance,
            'total_revenue' => $revenue,
            'total_transactions' => $totalTransactions,
            'status' => 'closed',
        ]);
    }
    
}
