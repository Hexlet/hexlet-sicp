<p>{{ __('exercises/4_19.description.1') }}</p>
<pre><code>(let ((a 1))
  (define (f x)
    (define b (+ a x))
    (define a 5)
    (+ a b))
  (f 10))</code></pre>
<p>{{ __('exercises/4_19.description.2') }}<a href="{{ route('exercises.show', getExercise('4.16')) }}">4.16</a>
{{ __('exercises/4_19.description.3') }}</p>
