<h1>Daftar Kategori</h1>

<a href="{{ route('categories.create') }}">Buat Kategori Baru</a>
<br>
<a href="{{ route('suppliers.index') }}">Kelola Supplier</a>
<br><br>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
    <br>
@endif

@if($categories->isEmpty())
    <p>Belum ada kategori yang tersimpan.</p>
@else
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>List Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description ?? '-' }}</td>

                <td style="text-align: center;">
                    <a href="{{ route('products.index', ['category' => $category->id]) }}">Lihat</a>
                </td>

                <td>
                    <a href="{{ route('categories.edit', $category) }}">Ubah</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif