<html> 
<head> 
    <title>Struk Belanja - {{ $transaction->invoice_number }}</title> 
</head> 
<body> 
    <a href="/transactions/history" style="color: #555; text-decoration: none;">← Kembali ke Riwayat Penjualan</a>
    <br><br>

    <div style="width: 380px; padding: 20px; border: 1px solid #ccc; font-family: monospace; background-color: #fff;">
        <div style="text-align: center;">
            <h3 style="margin-bottom: 5px;">TOKO KASIR KELOMPOK 5</h3>
            <small style="color: #666;">Universitas Tarumanagara Gedung R FTI </small>
            <hr style="border-top: 1px dashed #000; border-bottom: none; margin: 15px 0;">
        </div>

        <table width="100%" style="font-size: 13px; font-family: monospace;">
            <tr>
                <td><strong>No. Invoice:</strong></td>
                <td align="right">{{ $transaction->invoice_number }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal:</strong></td>
                <td align="right">{{ $transaction->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            <tr>
                <td><strong>Kasir:</strong></td>
                <td align="right">{{ $transaction->user->name ?? 'System' }}</td>
            </tr>
            <tr>
                <td><strong>Pelanggan:</strong></td>
                <td align="right">{{ $transaction->customer->name ?? 'Pelanggan Umum' }}</td>
            </tr>
        </table>

        <hr style="border-top: 1px dashed #000; border-bottom: none; margin: 15px 0;">

        <table width="100%" style="font-size: 13px; font-family: monospace;" cellpadding="3" cellspacing="0">
            <tbody>
                @foreach($transaction->details as $detail)
                <tr>
                    <td>
                        {{ $detail->product->name ?? 'Produk Dihapus' }}<br>
                        <small style="color: #555;">{{ $detail->quantity }} x Rp {{ number_format($detail->price, 0, ',', '.') }}</small>
                    </td>
                    <td align="right" valign="bottom">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr style="border-top: 1px dashed #000; border-bottom: none; margin: 15px 0;">

        <table width="100%" style="font-size: 13px; font-family: monospace;">
            <tr>
                <td align="right">Total Belanja:</td>
                <td align="right"><strong>Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td align="right">Jumlah Bayar:</td>
                <td align="right">Rp {{ number_format($transaction->pay_amount, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td align="right">Uang Kembali:</td>
                <td align="right" style="color: green; font-weight: bold;">Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}</td>
            </tr>
        </table>

        <hr style="border-top: 1px dashed #000; border-bottom: none; margin: 15px 0;">
        
        <div style="text-align: center; font-size: 13px;">
            <p style="margin-bottom: 5px;"><strong>Terima Kasih Atas Kunjungan Anda</strong></p>
            <p style="margin-top: 0; color: #555;">Metode Pembayaran: {{ $transaction->payment_method }}</p>
        </div>
    </div>

    <br>
    <button onclick="window.print()" style="padding: 8px 16px; cursor: pointer; font-weight: bold;">🖨️ Cetak Struk (Print)</button>
</body> 
</html>