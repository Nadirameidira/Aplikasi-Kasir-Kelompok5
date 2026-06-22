<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function checkout()
    {
        $products = Product::where('stock', '>', 0)->get();
        $customers = Customer::all();
        return view('transactions.checkout', compact('products', 'customers'));
    }

    //nyimpen data transaksi baru ke database, sekaligus validasi stok dan pembayaran
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min=1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min=1',
            'pay_amount' => 'required|integer',
            'payment_method' => 'required|string',
        ]);

        //buat database  
        return DB::transaction(function () use ($request) {
            $totalAmount = 0;
            $itemsToProcess = [];

            //cek stok dan hitung total belanja
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);
                
                if ($product->stock < $item['quantity']) {
                    return redirect()->back()->withErrors([
                        'stock' => "Stok untuk produk {$product->name} tidak mencukupi!"
                    ]);
                }

                $subtotal = $product->price * $item['quantity'];
                $totalAmount += $subtotal;

                $itemsToProcess[] = [
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'subtotal' => $subtotal
                ];
            }

            //cek uang pembayaran
            if ($request->pay_amount < $totalAmount) {
                return redirect()->back()->withErrors([
                    'pay_amount' => 'Jumlah uang pembayaran kurang dari total belanja!'
                ]);
            }

            //buat nomor random invoice 
            $invoiceNumber = 'TRX-' . date('Ymd') . '-' . strtoupper(uniqid());

            //nyimpen data transaksi
            $transaction = Transaction::create([
                'invoice_number' => $invoiceNumber,
                'user_id' => Auth::id() ?? 1, //jika belum ada sistem login, default ke user_id 1
                'customer_id' => $request->customer_id,
                'total_amount' => $totalAmount,
                'pay_amount' => $request->pay_amount,
                'change_amount' => $request->pay_amount - $totalAmount,
                'payment_method' => $request->payment_method,
            ]);

            //nyimpen detail transaksi sekaligus update stok produk
            foreach ($itemsToProcess as $detailItem) {
                $transaction->details()->create($detailItem);
            }

            return redirect()->route('transactions.show', $transaction->id)
                            ->with('success', 'Transaksi Berhasil Disimpan!');
        });
    }

 // 3.menampilkan Riwayat Transaksi
    public function history()
    {
        $transactions = Transaction::with(['user', 'customer'])->latest()->paginate(10);
        return view('transactions.history', compact('transactions'));
    }

    //buat struk
    public function show($id)
    {
        $transaction = Transaction::with(['user', 'customer', 'details.product'])->findOrFail($id);
        return view('transactions.detail', compact('transaction'));
    }

    //batalin transaksi, sekaligus kembalikan stok produk terkait
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        
        DB::transaction(function () use ($transaction) {
            //hapus detail transaksi dan otomatis kembalikan stok produk terkait melalui model events
            foreach ($transaction->details as $detail) {
                $detail->delete();
            }
            $transaction->delete();
        });

        return redirect()->route('transactions.history')->with('success', 'Transaksi Berhasil Dibatalkan!');
    }
}