<html> 
<head> 
    <title>KASIR KELOMPOK 5</title> 
</head> 
<body> 
    <h2>Aplikasi Kasir Kelompok 5</h2> 
 
    @if ($errors->any()) 
        <div style="color: red; border: 1px solid red; padding: 10px; width: fit-content;"> 
            <strong>Error!</strong> {{ $errors->first() }} 
        </div> 
        <br> 
    @endif 
 
    <form method="POST" action="/transactions/checkout"> 
        @csrf 
        
        <h3>1. Pilih Item Belanja</h3>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th>Pilih</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Stok Sisa</th>
                    <th>Jumlah Beli</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                <tr>
                    <td align="center">
                        <input type="checkbox" class="prod-check" name="items[{{$index}}][product_id]" value="{{ $product->id }}" id="prod-{{$product->id}}" data-price="{{ $product->price }}">
                    </td>
                    <td><label for="prod-{{$product->id}}"><strong>{{ $product->name }}</strong></label></td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td align="center">{{ $product->stock }}</td>
                    <td>
                        <input type="number" name="items[{{$index}}][quantity]" class="qty-input" value="1" min="1" max="{{ $product->stock }}" style="width: 60px;" disabled>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <h3>2. Informasi Pembayaran</h3>

        <label>Nama Pelanggan (Opsional):</label><br> 
        <select name="customer_id">
            <option value="">-- Pelanggan Umum --</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
        <br><br> 
 
        <label>Metode Pembayaran:</label><br> 
        <select name="payment_method">
            <option value="CASH">Uang Tunai (Cash)</option>
            <option value="DEBIT">Debit Card / QRIS</option>
        </select>
        <br><br> 

        <hr style="width: 50%; align: left;">
        <h3 style="color: blue;">Total Tagihan: Rp <span id="total-text">0</span></h3>
        <hr style="width: 50%; align: left;">
 
        <label>Jumlah Uang Bayar:</label><br> 
        <input type="number" name="pay_amount" id="pay_amount" placeholder="Masukkan nominal uang" required><br><br> 
        <p><i>*Pastikan jumlah uang bayar cukup atau pas dengan total tagihan.</i></p> 
 
        <button type="submit" style="padding: 10px 20px; background-color: green; color: white; border: none; cursor: pointer; font-weight: bold;">Selesaikan Transaksi</button> 
    </form> 

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.prod-check');
            const qtyInputs = document.querySelectorAll('.qty-input');
            const totalText = document.getElementById('total-text');
            
            function hitungTotal() {
                let total = 0;
                checkboxes.forEach((cb, idx) => {
                    if(cb.checked) {
                        //Jika dicentang, aktifkan input jumlah beli
                        qtyInputs[idx].disabled = false;
                        total += parseInt(cb.dataset.price) * parseInt(qtyInputs[idx].value || 0);
                    } else {
                        //Jika tidak dicentang, matikan input jumlah beli
                        qtyInputs[idx].disabled = true;
                    }
                });
                //Menampilkan total dengan format mata uang Indonesia
                totalText.innerText = total.toLocaleString('id-ID');
            }

            checkboxes.forEach((cb, idx) => {
                cb.addEventListener('change', hitungTotal);
                qtyInputs[idx].addEventListener('input', hitungTotal);
            });
        });
    </script>
</body> 
<a href="{{ Auth::user()->role == 'admin' ? '/admin' : '/kasir' }}">Kembali ke Dashboard</a>
</html>