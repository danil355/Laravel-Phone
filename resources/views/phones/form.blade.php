<?php
$phone = $phone ?? null;
?>

@extends('layouts.main')

@section('content')

    <h1>{{ $phone ? 'Изменить выбор телефона' : 'Новый телефон' }}</h1>

    @if($errors->any())
        <ul style="color: #ff6347; font-size: 80%;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ $phone ? route('phones.update', $phone) : route('phones.store') }}" method="post">
        @csrf

        @if($phone)
            @method('put')
        @endif

        <div><label for="title">Название</label></div>
        <div>
            <input value="{{ old('title', $phone->title ?? null) }}"
                   type="text"
                   id="title"
                   name="title"
                   placeholder="Введите название телефона ...">
        </div>

        <div><label for="content">Телефон</label></div>

        <div>
            <textarea name="content"
                      id="content"
                      cols="30" rows="5"
                      placeholder="Напишите характеристики телефона: ">
                {{ old('content', $phone->content ?? null) }}</textarea>
        </div>

        <div>
            <input value="{{ old('color', $phone->color ?? null) }}"
                   type="color"
                   id="color"
                   name="color"
            placeholder="Введите цвет телефона: ">
        </div>

        <div>
            <input value="{{ old('price', $phone->price ?? null) }}"
            type="text"
            id="price"
            name="price"
            placeholder="Введите цену: ">
        </div>


        <button>Сохранить</button>
    </form>
@endsection
