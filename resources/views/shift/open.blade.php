<!DOCTYPE html>
<html>
<head>
    <title>Buka Shift</title>
</head>
<body>

    <h2>Buka Shift</h2>

    @if(session('error'))
        <div style="background: #f8d7da; color: red; padding: 10px; border: 1px solid red;">
            {{ session('error') }}
        </div>
        <br>
    @endif

    @if(session('info'))
        <div style="background: #d1ecf1; color: blue; padding: 10px; border: 1px solid blue;">
            {{ session('info') }}
        </div>
        <br>
    @endif

    @if(session('success'))
        <div style="background: #d4edda; color: green; padding: 10px; border: 1px solid green;">
            {{ session('success') }}
        </div>
        <br>
    @endif

    <p><strong>Kasir:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Tanggal:</strong> {{ now()->format('d/m/Y H:i') }}</p>

    <form method="POST" action="{{ route('shift.open') }}">
        @csrf

        <label>Saldo Awal (Rp):</label><br>
        <input type="number" name="starting_balance" required min="0" placeholder="Masukkan saldo awal">
        <br><br>

        <label>Catatan (Opsional):</label><br>
        <textarea name="notes" rows="3" placeholder="Catatan shift..."></textarea>
        <br><br>

        <button type="submit" style="background: green; color: white; padding: 10px 20px; border: none; cursor: pointer;">
            Buka Shift
        </button>

    </form>

    <br>
    <a href="/login">Kembali</a>

</body>
</html>