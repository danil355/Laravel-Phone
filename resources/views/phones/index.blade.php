@extends('layouts.main')
{{--Вывод всех записей постов--}}

@section('content')
    <h1>Телефоны</h1>

    @can('create', 'App\Models\Phone')
        <p>
            <a href="{{ route('phones.create') }}">Новый телефон</a>
        </p>
    @endcan

    @if($phones->isEmpty())
        <p>
            Никаких постов нет!
        </p>
    @else

        <ul>
            @foreach($phones as $phone)
                <li>
                    <a href="{{ route('phones.show', $phone) }}">
                        {{ $phone->title }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{ $phones->links() }}

    @endif

@endsection
