<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
     @include('layouts/header-guest')
    <div class="wrapper">
        <form action="{{route('login.post')}}" class="form-reg" method="POST">
            @csrf
            <h1>Авторизация</h1>
            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" name="login" id="login" value="{{old('login')}}">
                  @error('login') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" name="password" id="password">
              
            </div>
            <button type="submit">Войти</button>
            <p>Ещу не зарегистрированы?<a href="{{route('register')}}">Регистрация</a></p>
        </form>
    </div>
</body>
</html>