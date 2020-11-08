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
