<html> 
<head> 
    <title>Login</title> 
</head> 
<body> 
    <h2>Login</h2> 
 
    @if ($errors->any()) 
        <div> 
            <strong>Error!</strong> {{ $errors->first('email') }} 
        </div> 
        <br> 
    @endif 
 
    <form method="POST" action="/login"> 
        @csrf 
        <label>Email:</label><br> 
        <input type="email" name="email"><br><br> 
        
 
        <label>Password:</label><br> 
        <input type="password" name="password"><br><br> 
        <label>Confirm Password:</label><br>
        <input type="password" name="confirm_password"><br><br>
        <p> Pastikan password sesuai.</p>
 
        <button type="submit">Login</button> 
    </form> 
</body> 
</html>