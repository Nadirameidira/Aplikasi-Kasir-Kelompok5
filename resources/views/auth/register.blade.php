<h2>Registrasi</h2>

<form method="POST" action="/register">
    @csrf
    Nama: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Konfirmasi Password: <input type="password" name="password_confirmation" required><br><br>
    <button type="submit">Daftar</button>
</form>

<br>
<a href="/login">Sudah punya akun? Login</a>