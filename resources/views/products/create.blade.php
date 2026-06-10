<h1>Tambah Produk Baru</h1>
<form method="POST" action="/products">
 @csrf
 Nama Produk:
 <br>
 <input name="name" required>
 <br>
 <br>
 Stok Awal:
 <br>
 <input type="number" name="stock" min="0" required>
 <br>
 <br>
 <button type="submit">Simpan Data & Stok</button>
</form>
