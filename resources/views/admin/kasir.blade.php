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
            </tr>
            @foreach ($kasirs as $kasir)
            <tr>
                <td>{{ $kasir->id }}</td>
                <td>{{ $kasir->name }}</td>
                <td>{{ $kasir->email }}</td>
            </tr>
            @endforeach
    </body>
</html>