<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Shift;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function openForm()
    {
       
        $activeShift = Shift::where('user_id', Auth::id())
            ->where('status', 'open')
            ->first();

        if ($activeShift) {
            return redirect('/kasir')
                ->with('info', 'Kamu masih memiliki shift aktif!');
        }

        return view('shift.open');
    }

    public function open(Request $request)
    {
        $request->validate([
            'starting_balance' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:255',
        ]);

      
        $activeShift = Shift::where('user_id', Auth::id())
            ->where('status', 'open')
            ->first();

        if ($activeShift) {
            return back()->with('error', 'Kamu sudah punya shift aktif!');
        }

        Shift::create([
            'user_id' => Auth::id(),
            'shift_start' => now(),
            'starting_balance' => $request->starting_balance,
            'notes' => $request->notes,
            'status' => 'open',
        ]);

        return redirect('/kasir')
            ->with('success', 'Shift berhasil dibuka! Saldo awal: Rp ' . number_format($request->starting_balance, 0, ',', '.'));
    }

    
    public function close(Request $request)
    {
        $shift = Shift::where('user_id', Auth::id())
            ->where('status', 'open')
            ->first();

        if (!$shift) {
            return redirect('/kasir/shift/open')
                ->with('error', 'Kamu tidak memiliki shift aktif!');
        }

        $request->validate([
            'ending_balance' => 'required|numeric|min:0',
        ]);

        
        $transactions = Transaction::where('user_id', Auth::id())
            ->whereBetween('created_at', [$shift->shift_start, now()])
            ->get();

        $totalTransactions = $transactions->count();
        $totalRevenue = $transactions->sum('total_amount');

        $shift->closeShift(
            $request->ending_balance,
            $totalRevenue,
            $totalTransactions
        );

        return redirect('/login')->with('success', 
            'Shift ditutup! Total transaksi: ' . $totalTransactions . 
            ', Total pendapatan: Rp ' . number_format($totalRevenue, 0, ',', '.')
        );
    }

}
