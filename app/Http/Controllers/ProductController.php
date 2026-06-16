<?php

namespace App\Http\Controllers;

use App\Models\Product; // Memanggil Model Product asli
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Tampilan Utama Katalog Produk
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Fitur Cari Produk
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Fitur Filter Kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Urutkan otomatis
        $products = $query->orderBy('category_id', 'asc')
                          ->orderBy('name', 'asc')
                          ->get();

        return view('products.index', compact('products'));
    }

    /**
     * Membuka Form Tambah Produk
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Menyimpan Produk Baru dari Web ke Database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Menerjemahkan kata teks pilihan menjadi angka ID untuk database kelompok
        $categoryId = 2; // Default Makanan
        if ($request->category == 'minuman') {
            $categoryId = 1;
        } elseif ($request->category == 'alat_tulis') {
            $categoryId = 3;
        }

        // Simpan langsung menjebol ke database MySQL asli
        Product::create([
            'name' => $request->name,
            'category_id' => $categoryId,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan ke database!');
    }

    /**
     * Membuka Form Ubah Produk
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Menyimpan Perubahan Data (Update) ke Database
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $categoryId = 2;
        if ($request->category == 'minuman') {
            $categoryId = 1;
        } elseif ($request->category == 'alat_tulis') {
            $categoryId = 3;
        }

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'category_id' => $categoryId,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect('/products')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus Produk dari Database
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Produk berhasil dihapus!');
    }
}