<h1>Form Daftar Supplier Baru</h1>

<a href="{{ route('suppliers.index') }}">Kembali</a>
<br><br>

<form method="POST" action="{{ route('suppliers.store') }}">
    @csrf

    Nama Supplier: <br>
    <input type="text" name="name" value="{{ old('name') }}" required>
    @error('name') <div style="color:red;">{{ $message }}</div> @enderror
    <br><br>

    Contact Person: <br>
    <input type="text" name="contact_person" value="{{ old('contact_person') }}">
    <br><br>

    Telepon: <br>
    <input type="text" name="phone" value="{{ old('phone') }}">
    <br><br>

    Email: <br>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email') <div style="color:red;">{{ $message }}</div> @enderror
    <br><br>

    Alamat: <br>
    <textarea name="address" rows="4">{{ old('address') }}</textarea>
    <br><br>

    <button type="submit">Simpan</button>
</form>