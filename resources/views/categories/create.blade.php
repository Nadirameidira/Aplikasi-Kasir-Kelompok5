<h1>Buat Kategori Baru</h1>

<a href="{{ route('categories.index') }}">Kembali</a>
<br><br>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    Nama Kategori:
    <br>
    <input type="text" name="name" value="{{ old('name') }}" required>
    @error('name')
        <br><span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    Deskripsi:
    <br>
    <textarea name="description" rows="4">{{ old('description') }}</textarea>
    <br><br>

    <button type="submit">Simpan</button>
</form>