<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <div class="wrapper">
        <form action="{{route('login.post')}}" class="form-reg" method="POST">
            @csrf
            <h1>Авторизация</h1>
            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" name="login" id="login" value="{{old('login')}}">
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>