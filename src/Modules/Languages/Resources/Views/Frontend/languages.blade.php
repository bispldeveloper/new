<ul class="dropdown menu bottom left" data-dropdown-menu>
    <li>
        <a href="#">Languages</a>
        <ul class="menu">
            @foreach(app('languages') as $code => $language)
                <li><a href="{{ route('language.change', $code) }}"><img src="{{ frontend('images/flags/' . $code . '.png') }}" alt=""></a></li>
            @endforeach
        </ul>
    </li>
</ul>
