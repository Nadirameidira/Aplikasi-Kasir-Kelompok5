<h1>Ubah Kategori</h1>

<a href="{{ route('categories.index') }}">Kembali</a>
<br><br>

<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')

    Nama Kategori:
    <br>
    <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
    @error('name')
        <br><span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    Deskripsi:
    <br>
    <textarea name="description" rows="4">{{ old('description', $category->description) }}</textarea>
    <br><br>

    <button type="submit">Update</button>
</form>
<a href="{{ Auth::user()->role == 'admin' ? '/admin' : '/kasir' }}">Kembali ke Dashboard</a>