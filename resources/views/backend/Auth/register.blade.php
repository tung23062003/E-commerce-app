<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="backend/css/customize.css">
</head>
<body>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <label for="">Họ và tên: </label>
        <input type="text" name="name" id="name"></br>
        @if ($errors->has('name'))
            <span class="error-message">* {{ $errors->first('name') }}</span></br>
        @endif

        <label for="">Email: </label>
        <input type="text" name="email" id="email"></br>
        @if ($errors->has('email'))
            <span class="error-message">* {{ $errors->first('email') }}</span></br>
        @endif

        <label for="">Mật khẩu: </label>
        <input type="password" name="password_confirmation" id="password"></br>
        @if ($errors->has('password_confirmation'))
            <span class="error-message">* {{ $errors->first('password_confirmation') }}</span></br>
        @endif

        <label for="">Nhập lại mật khẩu: </label>
        <input type="password" name="password" id="repassword"></br>
        @if ($errors->has('password'))
            <span class="error-message">* {{ $errors->first('password') }}</span></br>
        @endif
        
        <button>Đăng nhập</button>
    </form>
</body>
</html>