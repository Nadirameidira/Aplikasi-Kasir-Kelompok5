<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
</head>
<body>
    <h2>Lupa Password</h2>
    
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
        <br>
    @endif

    @if($errors->any())
        <div>
            <strong>Error!</strong> {{ $errors->first() }}
        </div>
        <br>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <label>Email Address:</label><br>
        <input type="email" name="email" required value="{{ old('email') }}"><br><br>
        <button type="submit">Kirim Link Reset Password</button>
    </form>

    <br>
    <a href="{{ route('login') }}">Kembali ke Login</a>
</body>
</html>