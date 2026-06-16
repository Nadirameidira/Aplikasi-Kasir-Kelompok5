<h1>Katalog Produk & Inventori</h1>

<form method="GET" action="/products" style="margin-bottom: 15px;">
    Cari Produk: <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama produk...">
    
    Filter Kategori:
    <select name="category">
        <option value="">Semua Kategori</option>
        <option value="1" {{ request('category') == '1' ? 'selected' : '' }}>Minuman</option>
        <option value="2" {{ request('category') == '2' ? 'selected' : '' }}>Makanan</option>
        <option value="3" {{ request('category') == '3' ? 'selected' : '' }}>Alat Tulis</option>
    </select>
    
    <button type="submit">Cari</button>
</form>

<a href="/products/create">Tambah Produk Baru</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th style="width: 50px;">No</th>
            <th style="width: 250px;">Nama Produk</th>
            <th style="width: 150px;">Kategori</th> <th style="width: 100px;">Stok</th>
            <th style="width: 150px;">Harga</th> <th style="width: 150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td style="text-align: center;">{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            
            <td>
                @if($product->category_id == 1) Minuman
                @elseif($product->category_id == 2) Makanan
                @elseif($product->category_id == 3) Alat Tulis
                @else - 
                @endif
            </td>
            
            <td style="text-align: center;">{{ $product->stock }}</td>
            
            <td style="text-align: right;">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
            
            <td style="text-align: center;">
                <a href="/products/{{ $product->id }}/edit">Ubah</a>
                <form action="/products/{{ $product->id }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>