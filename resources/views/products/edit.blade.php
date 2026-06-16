<h1>Apa nih yang mau diubah?</h1>

<form method="POST" action="/products/{{ $product->id }}" style="line-height: 2;">
    @csrf
    @method('PUT') 

    <div>
        <label>Nama Produk:</label><br>
        <input type="text" name="name" value="{{ $product->name }}" required>
    </div>

    <div>
        <label>Kategori Produk:</label><br>
        <select name="category" required>
            <option value="minuman" {{ $product->category_id == 1 ? 'selected' : '' }}>Minuman</option>
            <option value="makanan" {{ $product->category_id == 2 ? 'selected' : '' }}>Makanan</option>
            <option value="alat_tulis" {{ $product->category_id == 3 ? 'selected' : '' }}>Alat Tulis</option>
        </select>
    </div>

    <div>
        <label>Stok:</label><br>
        <input type="number" name="stock" value="{{ $product->stock }}" required>
    </div>

    <div>
        <label>Harga Jual (Rupiah):</label><br>
        <input type="text" id="price_display" value="{{ number_format($product->price, 0, ',', '.') }}" required>
        <input type="hidden" name="price" id="price_real" value="{{ intval($product->price) }}">
    </div>

    <br>
    <button type="submit">Simpan Perubahan</button>
    <a href="/products">Batal</a>
</form>

<script>
    const priceDisplay = document.getElementById('price_display');
    const priceReal = document.getElementById('price_real');

    function formatRupiah(angka) {
        return angka.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    priceDisplay.addEventListener('input', function(e) {
        const rawValue = this.value.replace(/\D/g, "");
        priceReal.value = rawValue;
        this.value = formatRupiah(rawValue);
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        if (!priceReal.value) {
            priceReal.value = priceDisplay.value.replace(/\D/g, "");
        }
    });
</script>