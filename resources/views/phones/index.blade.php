@extends('layouts.main')
{{--Вывод всех записей телефонов--}}

@section('content')
    <h1>Телефоны</h1>

    @can('create', 'App\Models\Phone')
        <p>
            <a href="{{ route('phones.create') }}">Новый телефон</a>
        </p>
    @endcan

    @include('components.phones-list')

@endsection
