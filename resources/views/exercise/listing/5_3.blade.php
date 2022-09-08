<p>{{ __('exercises/5_3.description.1') }}</p>
<pre><code>(define (sqrt x)
  (define (good-enough? guess)
    (< (abs (- (square guess) x)) 0.001))
  (define (improve guess)
    (average guess (/ x guess)))
  (define (sqrt-iter guess)
    (if (good-enough? guess)
        guess
        (sqrt-iter (improve guess))))
  (sqrt-iter 1.0))</code></pre>
<p>{{ __('exercises/5_3.description.2') }}
<code>good-enough?</code>
{{ __('exercises/5_3.description.3') }}
<code>improve</code>
{{ __('exercises/5_3.description.4') }}
<code>sqrt</code>
{{ __('exercises/5_3.description.5') }}
</p>
