<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;

class AdminController extends Controller
{
     public function dashboard()
    {
        $totalKasir = User::where('role', 'kasir')->count();
        $totalProduk = Product::count();
        $totalTransaksi = Transaction::count();
        $totalPendapatan = Transaction::sum('total_amount');

        return view('admin.dashboard', compact(
            'totalKasir',
            'totalProduk',
            'totalTransaksi',
            'totalPendapatan'
        ));
    }

    public function kasirList()
    {
        $kasirs = User::where('role', 'kasir')->get();
        return view('admin.kasir', compact('kasirs'));
    }
    
}
