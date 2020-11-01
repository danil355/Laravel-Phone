<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
</head>
<body>

<div class="container">

    <ul>
        <li>
            <a href="{{ route('index') }}">Главная</a>
        </li>

        <li>
            <a href="{{ route('phones.index') }}">Телефоны</a>
        </li>

    </ul>

    @yield('content')
</div>

</body>
</html>
