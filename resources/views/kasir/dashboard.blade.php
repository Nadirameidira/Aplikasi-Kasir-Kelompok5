<html>

<head>
    <title>Kasir</title>
    <style>
        body {
            display: flex;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .sidebar {
            width: 200px;
            background: #ddd;
            padding: 20px;
            height: 100vh;
        }
        .konten {
            padding: 20px;
            flex: 1;
        }
        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        .profile-avatar {
            font-size: 40px;
        }
        .setting-link {
            margin-left: 55px;
            margin-bottom: 20px;
        }
        .setting-link a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>


<div class="sidebar">
    <h3>Menu Kasir:</h3>
    <ul>
        <li><a href="/transactions/checkout">Transaksi Baru</a></li>
        <li><a href="/transactions/history">Riwayat Transaksi</a></li>
        <li><a href="/products">Kelola Produk</a></li>
        <li><a href="/customers">Kelola Pelanggan</a></li>
        <li><a href="/categories">Kelola Kategori</a></li>
        <li><a href="/reports">Laporan Penjualan</a></li>
        <li><a href="/suppliers">Kelola Supplier</a></li>
        <li><a href="/reports/low-stock">Stok Produk Menipis</a></li>
    </ul>

    <hr>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>


<div class="konten">
    <div class="profile">
        <div class="profile-avatar">(❁´◡`❁)</div>
        <h2>Halo, Kasir {{ Auth::user()->name }}!</h2>
    </div>

    <div class="setting-link">
        <a href="/kasir/profile"> Pengaturan Akun (Update Password)</a>
    </div>
@php
        use App\Models\Shift;
        use App\Models\Transaction;
        
        // Cari shift aktif
        $activeShift = Shift::where('user_id', auth()->id())
            ->where('status', 'open')
            ->first();
    @endphp

     @if($activeShift)
        <div class="shift-active">
            <strong>Shift Aktif</strong><br>
            Dibuka: {{ $activeShift->shift_start->format('d/m/Y H:i') }}<br>
            Saldo Awal: Rp {{ number_format($activeShift->starting_balance, 0, ',', '.') }}

            @php
                $shiftTransactions = Transaction::where('user_id', auth()->id())
                    ->whereBetween('created_at', [$activeShift->shift_start, now()])
                    ->get();
            @endphp

            <hr>
            <div class="stat">Transaksi: {{ $shiftTransactions->count() }}</div>
            <div class="stat">Pendapatan: Rp {{ number_format($shiftTransactions->sum('total_amount'), 0, ',', '.') }}</div>

            <br><br>
            <form method="POST" action="{{ route('shift.close') }}" style="display:inline;">
                @csrf
                <label>Saldo Akhir: 
                    <input type="number" name="ending_balance" required min="0" style="width:150px; padding:5px;">
                </label>
                <button type="submit" class="btn-red">Tutup Shift</button>
            </form>
        </div>
    @else
        <div class="shift-inactive">
            <strong>Belum Buka Shift!</strong>
            <p>Buka shift dulu sebelum transaksi.</p>
            <a href="{{ route('shift.open.form') }}" class="btn-green">Buka Shift</a>
        </div>
    @endif

    <hr>
</div>

</body>
</html>