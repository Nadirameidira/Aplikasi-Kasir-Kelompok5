<h1>Daftar Supplier</h1>

<a href="{{ route('categories.index') }}">Kelola Kategori</a>
<br>
<a href="{{ route('suppliers.create') }}">Tambah Supplier Baru</a>
<br><br>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
    <br>
@endif

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Kontak Person</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suppliers as $index => $supplier)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->contact_person ?? '-' }}</td>
            <td>{{ $supplier->phone ?? '-' }}</td>
            <td>{{ $supplier->email ?? '-' }}</td>
            <td>{{ $supplier->address ?? '-' }}</td>
            <td>
                <a href="{{ route('suppliers.edit', $supplier) }}">Edit</a>
                <form method="POST" action="{{ route('suppliers.destroy', $supplier) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>