@section('content')
    <h1>{{ $phone->title }}</h1>

    <div>
        <a href="{{ route('phones.edit', $phone) }}">Редактировать</a>
        <a href="{{ route('phones.destroy', $phone) }}"
           onclick="event.preventDefault(); document.getElementById('delete-form').submit()">
            Удалить
        </a>
    </div>

    <form id="delete-form" action="{{ route('phones.destroy', $post) }}" method="post">
        @csrf @method('delete')
    </form>

    <p>{{ $phone->content }}</p>
@endsection
