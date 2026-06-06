<h1>Katalog Produk & Inventori</h1>

<form method="GET" action="/products" style="margin-bottom: 15px;">
 Cari Produk: <input type="text" name="search" placeholder="Nama produk...">
 
 Filter Kategori: 
 <select name="category">
 <option value="">Semua Kategori</option>
 <option value="makanan">Makanan</option>
 <option value="minuman">Minuman</option>
 </select>
 
 <button type="submit">Cari</button>
</form>

<a href="/products/create">Tambah Produk Baru</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0">
 <thead>
 <tr>
 <th style="width: 50px">No</th>
 <th style="width: 250px">Nama Produk</th>
 <th style="width: 100px">Stok</th>
 <th style="width: 150px">Aksi</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <td style="text-align: center">1</td>
 <td>Kopi Susu Gula Aren</td>
 <td style="text-align: center">25</td>
 <td style="text-align: center">
 <a href="/products/1/edit">Ubah</a>
 
 <form action="/products/1" method="post" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini (Soft Delete)?')">
 @csrf 
 @method('DELETE')
 <button type="submit">Hapus</button>
 </form>
 </td>
 </tr>
 </tbody>
</table>