@foreach ($languageUrls as $language => $url)
  <link rel="alternate" hreflang="{{ $language }}" href="{{ url('/') }}/{{ $url }}" />
@endforeach
