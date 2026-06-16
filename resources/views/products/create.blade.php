<h1>Tambah Produk Baru Yukk!</h1>

<form method="POST" action="/products" style="line-height: 2;">
    @csrf
    
    <div>
        <label>Nama Produk:</label><br>
        <input type="text" name="name" placeholder="Contoh: Susu Kotak, Roti..." required>
    </div>

    <div>
        <label>Kategori Produk:</label><br>
        <select name="category" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="minuman">Minuman</option>
            <option value="makanan">Makanan</option>
            <option value="alat_tulis">Alat Tulis</option>
        </select>
    </div>

    <div>
        <label>Stok Awal:</label><br>
        <input type="number" name="stock" placeholder="0" required>
    </div>

    <div>
        <label>Harga Jual (Rupiah / per unit):</label><br>
        <input type="number" name="price" placeholder="Contoh: 15000" required>
    </div>

    <br>
    <button type="submit">Simpan Produk ke Database</button>
    <a href="/products">Kembali</a>
</form>