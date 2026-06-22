<html> 
<head> 
    <title>Login</title> 
</head> 
<body> 
    <h2>Login</h2> 
 
    @if ($errors->has('email')) 
        <div> 
            <strong>Error email not valid!</strong> {{ $errors->first('email') }} 
        </div> 
        <br> 
    @endif 

    @if ($errors->has('password')) 
        <div> 
            <strong>Error password not valid!</strong> {{ $errors->first('password') }} 
        </div> 
        <br> 
    @endif

        @if (session('login_error')) 
        <div> 
            <strong>Login Error, account not found</strong> {{ session('login_error') }} 
        </div> 
        <br> 
    @endif
 
    <form method="POST" action="/login"> 
        @csrf 
        <label>Email:</label><br> 
        <input type="email" name="email"><br><br> 
        
 
        <label>Password:</label><br> 
        <input type="password" name="password"><br><br> 

 
        <button type="submit">Login</button> 
         <button type="button" onclick="window.location.href='/forgot-password'">Lupa Password?</button>
    </form> 
</body> 
<a href="/register">Belum punya akun? Daftar</a>
</html>