<h1>{{ __('sicp.title') }}</h1>
<h3>{{ __('sicp.authors') }}</h3>
@foreach (__('sicp.chapters') as $number => $chapter)
<ul>
    <li>
        {{ $number }} {{ $chapter }}
    </li>
</ul>
@endforeach
