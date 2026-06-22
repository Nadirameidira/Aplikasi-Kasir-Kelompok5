<html> 
<head> 
    <title>Riwayat Penjualan</title> 
</head> 
<body> 
    <h2>Riwayat Transaksi Penjualan</h2> 
    
    <a href="/transactions/checkout" style="padding: 6px 12px; background-color: #007bff; color: white; text-decoration: none; font-weight: bold; border-radius: 3px;">+ Transaksi Baru</a>
    <br><br>

    @if(session('success')) 
        <div style="color: green; border: 1px solid green; padding: 10px; width: fit-content; background-color: #e6f4ea;"> 
            <strong>Sukses!</strong> {{ session('success') }} 
        </div> 
        <br> 
    @endif 

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>No. Invoice</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Kasir</th>
                <th>Nama Pelanggan</th>
                <th>Total Belanja</th>
                <th>Metode Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $trx)
            <tr>
                <td><strong>{{ $trx->invoice_number }}</strong></td>
                <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ $trx->user->name ?? 'System' }}</td>
                <td>{{ $trx->customer->name ?? 'Pelanggan Umum' }}</td>
                <td>Rp {{ number_format($trx->total_amount, 0, ',', '.') }}</td>
                <td><span style="background-color: #e0f7fa; padding: 3px 6px; font-size: 12px; font-weight: bold;">{{ $trx->payment_method }}</span></td>
                <td>
                    <a href="/transactions/{{ $trx->id }}" style="color: blue;">Lihat Struk</a> 
                    | 
                    <form action="/transactions/{{ $trx->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini? Stok barang akan otomatis dikembalikan semula!')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red; background: none; border: none; cursor: pointer; text-decoration: underline; padding: 0;">Batalkan</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" align="center" style="color: #666; padding: 20px;">Belum ada data transaksi di database.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <div>
        {{ $transactions->links() }}
    </div>
</body> 
<a href="{{ Auth::user()->role == 'admin' ? '/admin' : '/kasir' }}">Kembali ke Dashboard</a>
</html>