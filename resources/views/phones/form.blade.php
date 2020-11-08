<?php
$phone = $phone ?? null;
?>
@extends('layouts.main')

@section('content')
    <h1>{{ $phone ? 'Изменить выбор телефон' : 'Новый телефон' }}</h1>

    @include('components.form-errors')

    <form enctype="multipart/form-data" action="{{ $phone ? route('phones.update', $phone) : route('phones.store') }}" method="post">
        @csrf

        @if($phone)
            @method('put')
        @endif

        <div>
            <label for="image">Изображение</label>
        </div>

        <div>
            <input type="file" name="image" id="image" accept="image/*" />
        </div>

        <div>
            <label for="title">Название</label>
        </div>
{{--Samsung--}}
        <div>
            <input value="{{ old('title', $phone->title ?? null) }}"
                   type="text"
                   id="title"
                   name="title"
                   cols="30"
                   placeholder="Введите телефон">
        </div>

        <div>
            <label for="content">Телефон</label>
        </div>
{{--Galaxy S10, ОЗУ 4 гб, Память 128 гб--}}
        <div>
            <textarea name="content"
                      id="content"
                      cols="30" rows="5"
                      placeholder="Введите модель телефона и напишите характеристику, которую хотите в телефоне"
            >{{ old('content', $phone->content ?? null) }}</textarea>
        </div>

        <div>
            <label for="color">Цвет</label>
        </div>
{{--Белый--}}
        <div>
            <input value="{{ old('color', $phone->color ?? null) }}"
                   type="text"
                   id="color"
                   name="color"
                   placeholder="Введите цвет телефона: ">
        </div>

        <div>
            <label for="price">Цена</label>
        </div>
{{--350.000 --}}
        <div>
            <input value="{{ old('price', $phone->price ?? null) }}"
                   type="text"
                   id="price"
                   name="price"
                   placeholder="Введите цену телефона: ">
        </div>

        <button>Сохранить</button>

    </form>

@endsection
