<?php

namespace App\Http\Controllers;

use App\Models\Product; // Memanggil Model Product asli
use App\Models\Category; 
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
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255', 
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Merapikan teks (contoh: "alat tulis" jadi "Alat Tulis")
        $categoryName = ucwords(strtolower(trim($request->category)));

        // Fitur auto-add kategori produk: Cari kategori ini. Kalau belum ada di tabel, tolong buatkan.
        $category = Category::firstOrCreate([
            'name' => $categoryName
        ]);

        // Simpan langsung menjebol ke database MySQL asli
        Product::create([
            'name' => $request->name,
            'category_id' => $category->id,
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
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $categoryName = ucwords(strtolower(trim($request->category)));

        $category = Category::firstOrCreate([
            'name' => $categoryName
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'category_id' => $category->id,
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