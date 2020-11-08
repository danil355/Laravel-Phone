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

    @if($phone->image_path)
        <div>
            <img style="max-width: 100%" src="{{ Storage::url($phone->image_path) }}" alt="{{ $phone->title }}">
        </div>
    @endif

    <p>{{ $phone->content }}</p>
    <p>{{ $phone->color }}</p>
    <p>{{ $phone->price }}</p>


    @auth
        <button id="favorite-button" data-id="{{ $phone->id }}">
            {{ auth()->user()->isFavorite($phone) ? 'В избранном' : 'Добавить в избранное' }}
        </button>
    @endauth

    <hr />

    <div>
        <h3>Коментарии</h3>

        @can('create', ['App\Models\Comment', $phone])

            <form action="{{ route('comments.store', $phone) }}" method="post">
                @csrf
                <strong>Новый коментарий</strong>

                @include('components.form-errors')

                <div>
                    <textarea name="content" id="content" cols="30" rows="3">{{ old('content') }}</textarea>
                </div>

                <button>Добавить</button>
            </form>

        @endcan

    </div>

    <hr />

    @if($comments->isNotEmpty())
        <div>
            @foreach($comments as $comment)
                <div class="mb-3">

                    <div>
                        {{ $comment->content }}
                    </div>

                    @can('delete', $comment)
                        <form method="post" action="{{ route('comments.destroy', $comment) }}">
                            @csrf @method('delete')
                            <button>Удалить</button>
                        </form>
                    @endcan

                    <div>
                        <small>Автор: {{ $comment->user->name }}</small>,
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

@endsection
