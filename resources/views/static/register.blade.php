<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <div class="wrapper">
        <form action="{{route('register.post')}}" class="form-reg" method="POST">
            @csrf
            <h1>Регистрация</h1>
            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" name="login" id="login" value="{{old('login')}}">
                @error('login') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" name="password" id="password">
                @error('password') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="email">Почта:</label>
                <input type="email" name="email" id="email" value="{{old('email')}}">
                @error('email') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона:</label>
                <input type="tel" name="phone" id="phone" value="{{old('phone')}}">
                @error('phone') <div class="error">{{$message}}</div>@enderror
            </div>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>