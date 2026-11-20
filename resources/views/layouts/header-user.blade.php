<header>
    <b>Фотоссесии.РФ</b>
    <nav>
        <a href="{{route('applications')}}">Личный кабинет</a>
        <a href="{{route('Booking')}}">Новая заявка</a>
        <form action="{{route('logout')}}" method="post">
            @csrf
        <button type="submit">Выйти</button>
        </form>
    </nav>
</header>