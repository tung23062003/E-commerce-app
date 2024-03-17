<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="backend/css/customize.css">
</head>
<body>
    <form action="{{ route('login.auth') }}" method="POST">
        @csrf
        <label for="">Email: </label>
        <input type="text" name="email" id="email"></br>
        @if ($errors->has('email'))
            <span class="error-message">* {{ $errors->first('email') }}</span></br>
        @endif

        <label for="">Mật khẩu: </label>
        <input type="password" name="password" id="username"></br>
        @if ($errors->has('password'))
            <span class="error-message">* {{ $errors->first('password') }}</span></br>
        @endif
        
        <button>Đăng nhập</button>
    </form>
</body>
</html>