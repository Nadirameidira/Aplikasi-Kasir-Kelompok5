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
    </ul>

    <hr>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>