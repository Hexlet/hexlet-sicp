<p>{{ __('exercises/3_75.description.1') }}<a href="{{ route('exercises.show', getExercise('3.74')) }}">3.74</a>
{{ __('exercises/3_75.description.2') }}</p>
<pre><code>(define (make-zero-crossings input-stream last-value)
  (let ((avpt (/ (+ (stream-car input-stream) last-value) 2)))
    (cons-stream (sign-change-detector avpt last-value)
                 (make-zero-crossings (stream-cdr input-stream)
                                      avpt))))
</code></pre>
<p>{{ __('exercises/3_75.description.3') }}
<code>make-zero-crossings</code>
{{ __('exercises/3_75.description.4') }}
</p>
