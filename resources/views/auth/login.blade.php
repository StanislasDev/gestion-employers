<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Login page</title>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="{{ route('handleLogin') }}">
            @csrf
            @method('POST')

            <div class="user-box">
                @if (Session::get('error_msg'))
                <b style="color: red; margin-bottom: 20px;">{{ Session::get('error_msg') }}</b>
                    
                @endif
                <input type="email" name="email" required>
                <label for="">Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required>
                <label for="">Password</label>
            </div>
            <button type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Connexion
            </button>
        </form>
    </div>
</body>
</html>