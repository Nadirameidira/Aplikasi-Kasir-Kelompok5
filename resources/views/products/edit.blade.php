<h1>Ubah Data & Stok Produk (ID: {{ $id }})</h1>
<form method="POST" action="/products/{{ $id }}">
 @csrf 
 @method('PUT')
 Nama Produk:
 <br>
 <input name="name" value="Contoh Nama Produk" required>
 <br>
 <br> 
 Jumlah Stok:
 <br>
 <input type="number" name="stock" value="10" min="0" required>
 <br>
 <br>
 <button type="submit">Simpan Perubahan</button>
</form>