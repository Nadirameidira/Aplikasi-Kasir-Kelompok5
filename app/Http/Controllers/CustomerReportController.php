<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\DailyReport;

class CustomerReportController extends Controller
{
    public function getDailyReport()
    {
        $today = now()->toDateString();
        $transactions = DB::table('transactions')->whereDate('transaction_date', $today)->where('status', 'Success!')->get();
        $totalRevenue = $transactions->sum('total_price');
        $totalTransactions = $transactions->count();

        return view('reports.daily', compact('totalRevenue', 'totalTransactions', 'transactions'));
    }

    public function getLowStock()
    {
        $lowStockProducts = DB::table('products')->where('stock', '<', 10)->get();
        return view('reports.low_stock', compact('lowStockProducts'));
    }

    public function getAllCustomers()
    {
        $customers = DB::table('customers')->orderBy('name', 'asc')->get();
        return view('customers.index', compact('customers'));
    }

    public function showRegisterForm()
    {
        return view('customers.register');
    }

    public function registerCustomer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        DB::table('customers')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/customers')->with('success', 'Member baru berhasil didaftarkan!');
    }
}