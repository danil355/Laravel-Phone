@extends('layouts.main')

@section('content')
    <h1>{{ $phone->title }}</h1>
    <small>
        Автор: {{ $phone->user->name }}
    </small>

    <div>

        @can('update', $phone)
            <a href="{{ route('phones.edit', $phone) }}">Редактировать</a>
        @endcan

        @can('delete', $phone)
            <a href="{{ route('phones.destroy', $phone) }}"
               onclick="event.preventDefault(); document.getElementById('delete-form').submit()">
                Удалить
            </a>
            <form id="delete-form" action="{{ route('phones.destroy', $phone) }}" method="post">
                @csrf @method('delete')
            </form>
        @endcan

    </div>

    <p>{{ $phone->content }}</p>
    <p>{{ $phone->color }}</p>
    <p>{{ $phone->price }} Тенге</p>


@endsection
