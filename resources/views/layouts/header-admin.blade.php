<header>
    <b>Фотоссесии.РФ</b>
    <nav>
        <a href="{{route('Panel')}}">Панель</a>
       <form action="{{route('logout')}}" method=post>
        @csrf
        <button type="submit">Выход</button>
       </form>
</header>