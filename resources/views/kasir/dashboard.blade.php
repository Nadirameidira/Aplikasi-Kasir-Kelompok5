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
        <li><a href="/kasir/products">Stok Barang</a></li>
        <li><a href="/kasir/laporan">Laporan Penjualan</a></li>
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

    <hr>
</div>

</body>
</html>