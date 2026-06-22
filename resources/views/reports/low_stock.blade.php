<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peringatan Stok Menipis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="text-danger mb-4"> Peringatan: Produk Stok Menipis</h2>
        <p class="text-muted">Berikut adalah daftar produk inventori yang jumlah stoknya di bawah batas minimum (10 pcs).</p>

        <table class="table table-hover table-bordered">
            <thead class="table-danger">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kode Produk</th>
                    <th>Sisa Stok</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lowStockProducts as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code ?? '-' }}</td>
                    <td class="fw-bold text-danger">{{ $product->stock }} pcs</td>
                    <td><span class="badge bg-warning text-dark">Restock Segera!</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-success fw-bold">Aman! Semua produk memiliki stok yang cukup.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <br>
        <a href="{{ Auth::user()->role == 'admin' ? '/admin' : '/kasir' }}" class="btn btn-secondary"> Kembali ke Dashboard</a>
    </div>
</body>
</html>