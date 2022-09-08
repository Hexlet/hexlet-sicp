<p>{{ __('exercises/2_68.description.1') }}
<code>encode</code>
{{ __('exercises/2_68.description.2') }}
</p>
<pre><code>(define (encode message tree)
  (if (null? message)
      '()
      (append (encode-symbol (car message) tree)
              (encode (cdr message) tree))))
</code></pre>
<p>
<code>Encode-symbol</code>
{{ __('exercises/2_68.description.3') }}
<code>encode-symbol</code>
{{ __('exercises/2_68.description.4') }}
<a href="{{ route('exercises.show', getExercise('2.67')) }}">2.67</a>
{{ __('exercises/2_68.description.5') }}</p>
