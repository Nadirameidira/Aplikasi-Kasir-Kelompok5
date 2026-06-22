<h1>Edit Supplier</h1>

<a href="{{ route('suppliers.index') }}">Kembali</a>
<br><br>

<form method="POST" action="{{ route('suppliers.update', $supplier) }}">
    @csrf
    @method('PUT')

    Nama Supplier: <br>
    <input type="text" name="name" value="{{ old('name', $supplier->name) }}" required>
    <br><br>

    Kontak Person: <br>
    <input type="text" name="contact_person" value="{{ old('contact_person', $supplier->contact_person) }}">
    <br><br>

    Telepon: <br>
    <input type="text" name="phone" value="{{ old('phone', $supplier->phone) }}">
    <br><br>

    Email: <br>
    <input type="email" name="email" value="{{ old('email', $supplier->email) }}">
    <br><br>

    Alamat: <br>
    <textarea name="address" rows="4">{{ old('address', $supplier->address) }}</textarea>
    <br><br>

    <button type="submit">Update</button>
</form>
<a href="{{ Auth::user()->role == 'admin' ? '/admin' : '/kasir' }}">Kembali ke Dashboard</a>