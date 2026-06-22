<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h2>Halo, Admin {{ Auth::user()->name }}!</h2>

    <hr>

    <h3>Menu Admin:</h3>
    <ul>
        <li><a href="/admin/kasir">Kelola Data Kasir</a></li>
        <li><a href="/products">Kelola Produk</a></li>
        <li><a href="/categories">Kelola Kategori</a></li>
        <li><a href="/suppliers">Kelola Supplier</a></li>
        <li><a href="/transactions/history">Lihat Semua Transaksi</a></li>
        <li><a href="/reports">Laporan Penjualan</a></li>
    </ul>
<hr>

    <h3>MORE INFO FOR U >< :</h3>
    <ul>
        <li>Total Kasir: {{ $totalKasir ?? 0 }}</li>
        <li>Total Produk: {{ $totalProduk ?? 0 }}</li>
        <li>Total Transaksi: {{ $totalTransaksi ?? 0 }}</li>
        <li>Total Pendapatan: Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</li>
    </ul>

    <hr>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>