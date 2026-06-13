<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Analitik Harian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="mb-4"> Dashboard Analitik & Omset Hari Ini</h2>
        
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card bg-success text-white p-4">
                    <h5> Total Pendapatan Harian</h5>
                    <h3>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-info text-white p-4">
                    <h5>🛒 Total Transaksi Sukses</h5>
                    <h3>{{ $totalTransactions }} Transaksi</h3>
                </div>
            </div>
        </div>

        <h4 class="mb-3">Log Transaksi Masuk Terkini</h4>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Waktu</th>
                    <th>ID Transaksi</th>
                    <th>Status</th>
                    <th>Total Belanja</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $trx)
                <tr>
                    <td>{{ $trx->created_at }}</td>
                    <td>TRX-{{ $trx->id }}</td>
                    <td><span class="badge bg-success">{{ $trx->status }}</span></td>
                    <td>Rp {{ number_format($trx->total_price, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data transaksi masuk hari ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <br>
        <a href="/posts" class="btn btn-secondary">⬅ Kembali ke Dashboard</a>
    </div>
</body>
</html>