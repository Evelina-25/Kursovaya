<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки</title>
</head>
<body>
    @include('layouts/header-user')
    <h1>Мои заявки</h1>
    <div class="grid-content">
        @foreach($bookings as $booking)
        <div class="card">
            <p><strong>Дата:</strong>{{$booking->date_start->format('d.m.Y')}}</p>
            <p><strong>Время:</strong>{{$booking->time_start}}</p>
            <p><strong>Услуги:</strong>{{$booking->GetServices->pluck('name')->join(', ')}}</p>
            <p><strong>Стоимость:</strong>{{$booking->GetServices->sum('price')}} Р</p>
            <p><strong>Продолжительность съемки:</strong>{{$booking->GetServices->sum('duration')}} минут</p>
            <p><strong>Фотозона:</strong>{{$booking->GetZone->name}}</p>
            <p><strong>Способ оплаты:</strong>{{$booking->GetPaymentMethod->name}}</p>
            <p><strong>Статус:</strong>{{$booking->status}}</p>
        </div>
        @endforeach

        @if($booking->GetReview)
        <p><strong>Отзыв:</strong>{{$booking->GetReview->text}}</p>
        @elseif($booking->status==="Завершена")
        <form action="{{route('review.post', $booking->id)}}" method="post">
            @csrf 
            <textarea name="text" id=""></textarea>
            @error('text') <div class="error">{{$message}}</div>@enderror
            <button type="submit">Отправить отзыв</button>
        </form>
        @endif
    </div>
</body>
</html>