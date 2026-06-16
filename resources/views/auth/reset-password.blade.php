<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>

    @if($errors->any())
        <div>
            <strong>Error!</strong> {{ $errors->first() }}
        </div>
        <br>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <label>Email:</label><br>
        <input type="email" name="email" required value="{{ old('email') }}"><br><br>
        
        <label>Password Baru:</label><br>
        <input type="password" name="password" required><br><br>
        
        <label>Konfirmasi Password Baru:</label><br>
        <input type="password" name="password_confirmation" required><br><br>
        
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>