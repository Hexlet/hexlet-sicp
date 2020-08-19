<p>{{ __('exercises/4_53.description.1') }}<a href="{{ route('exercises.show', getExercise('4.51')) }}">4.51</a>
{{ __('exercises/4_53.description.2') }}<a href="{{ route('exercises.show', getExercise('4.52')) }}">4.52</a>
{{ __('exercises/4_53.description.3') }}</p>
<pre><code>(let ((pairs '()))
  (if-fail (let ((p (prime-sum-pair '(1 3 5 8) '(20 35 110))))
             (permanent-set! pairs (cons p pairs))
             (amb))
           pairs))
</code></pre>
