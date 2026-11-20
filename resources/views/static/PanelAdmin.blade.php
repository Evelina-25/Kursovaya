<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки</title>
</head>
<body>
    @include('layouts/header-admin')
    <h1>Заявки</h1>
    <div class="grid-content">
        @foreach($bookings as $booking)
        <div class="card">
            <p><strong>Почта:</strong>{{$booking->GetUser->email}}</p>
            <p><strong>Номер телефона:</strong>{{$booking->GetUser->phone}}</p>
            <p><strong>Дата:</strong>{{$booking->date_start}}</p>
            <p><strong>Время:</strong>{{$booking->time_start}}</p>
            <p><strong>Услуга:</strong>{{$booking->GetServices->pluck('name')->join(', ')}}</p>
            <p><strong>Фотозона:</strong>{{$booking->GetZone->name}}</p>
            <p><strong>Способ оплаты:</strong>{{$booking->GetPaymentMethod->name}}</p>
            <p><strong>Статус:</strong>{{$booking->status}}</p>
        </div>
        <form action="{{route('Panel.post', $booking->id)}}" method="POST">
            @csrf
            <select name="status" id="status">
                @foreach($statuses as $status)
                <option value="{{$status}}" @selected($booking->status===$status)>{{$status}}</option>
                @endforeach
            </select>
            <button type="submit">Сменить статус</button>
        </form>
        @endforeach
    </div>
</body>
</html>