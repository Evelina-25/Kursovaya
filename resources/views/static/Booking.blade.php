<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронирование</title>
</head>
<body>
     @include('layouts/header-user')
    <div class="wrapper">
        <form action="{{route('Booking.post')}}" class="form-reg" method="POST">
            @csrf
            <h1>Бронирование</h1>
            <div class="form-group">
                <label for="date_start">Выберите дату:</label>
                <input type="date" name="date_start" id="date_start" value="{{old('date_start')}}">
                @error('date_start') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="time_start">Выберите время:</label>
                <input type="time" name="time_start" id="time_start">
                @error('time_start') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="payment_method_id">Выберите способ оплаты:</label>
                <select name="payment_method_id" id="payment_method_id">
                    <option value="">Выберите</option>
                        @foreach($paymentMethods as $method)
                        <option value="{{$method->id}}" @selected(old('payment_method_id') == $method->id)>{{$method->name}}</option>
                        @endforeach
                </select>
                @error('payment_method_id') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="zone_id">Выберите фотозону:</label>
                <select name="zone_id" id="zone_id">
                    <option value="">Выберите</option>
                    @foreach($zones as $zone)
                        <option value="{{$zone->id}}">{{$zone->name}}</option>
                    @endforeach
                </select>
                @error('zone_id') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label>Выберите услуги:</label>
                @foreach($services as $service)
                <label>
                    <input type="checkbox" name="service_ids[]" value="{{$service->id}}"
                        @checked(in_array($service->id, old('service_ids', [])))>
                        {{$service->name}} ({{$service->price}} P, {{$service->duration}} мин)
                </label>
                @endforeach
                @error('service_ids') <div class="error">{{$message}}</div>@enderror
            </div>
            <button type="submit">Отправить</button>
        </form>
    </div>
</body>
</html>