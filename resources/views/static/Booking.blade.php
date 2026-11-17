<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронирование</title>
</head>
<body>
    <div class="wrapper">
        <form action="{" class="form-reg" method="">
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
                <label for="payment">Выберите способ оплаты:</label>
                <select name="payment" id="payment">
                <option value="">Выберите</option>
                <option value="Наличные">Наличные</option>
                <option value="Переводом на карту">Переводом на карту</option>
                </select>
                @error('payment') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="zone_id">Выберите зону:</label>
                <select name="zone_id" id="zone_id">
                    @foreach($zones as $zone)
                        <option value="{{$zone->id}}">{{$zone->name}}</option>
                    @endforeach
                </select>
                @error('zone_id') <div class="error">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="service_id">Выберите услугу:</label>
                <select name="service_id" id="service_id">
                    @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                </select>
                @error('service_id') <div class="error">{{$message}}</div>@enderror
            </div>
            <button type="submit">Отправить</button>
        </form>
    </div>
</body>
</html>