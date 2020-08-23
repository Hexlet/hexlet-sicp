<p>{{ __('exercises/4_8.description.1') }}</p>
<pre><code>(let var bindings body)</code></pre>
<p>{{ __('exercises/4_8.description.2') }}</p>
<pre><code>(define (fib n)
  (let fib-iter ((a 1)
                 (b 0)
                 (count n))
    (if (= count 0)
        b
        (fib-iter (+ a b) a (- count 1)))))</code></pre>
 <p>{{ __('exercises/4_8.description.3') }}<a href="{{ route('exercises.show', getExercise('4.6')) }}">4.6</a>
{{ __('exercises/4_8.description.4') }}</p>
