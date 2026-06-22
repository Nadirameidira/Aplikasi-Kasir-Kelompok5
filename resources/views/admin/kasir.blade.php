<html>
    <head>
    <title>Data Kasir</title>
    </head>
    <body>
        <h1>Data Kasir</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            @foreach ($kasirs as $kasir)
            <tr>
                <td>{{ $kasir->id }}</td>
                <td>{{ $kasir->name }}</td>
                <td>{{ $kasir->email }}</td>
                <td>{{ $kasir->role }}</td>
            </tr>
            @endforeach
            </button> kembali ke <a href="/admin">Dashboard</a>
        </table>
    </body>
</html>