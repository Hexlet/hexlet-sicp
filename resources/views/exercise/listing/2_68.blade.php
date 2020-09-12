<p>{{ __('exercises/2_68.description.1') }}</p>
<pre><code>(define (encode message tree)
  (if (null? message)
      '()
      (append (encode-symbol (car message) tree)
              (encode (cdr message) tree))))
</code></pre>
<p>{{ __('exercises/2_68.description.2') }}<a href="{{ route('exercises.show', getExercise('2.67')) }}">2.67</a>
{{ __('exercises/2_68.description.3') }}</p>
