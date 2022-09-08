<p>{{ __('exercises/1_22.description.1') }}
<code>runtime</code>
{{ __('exercises/1_22.description.2') }}
<code>timed-prime-test</code>
{{ __('exercises/1_22.description.3') }}
<code>n</code>
{{ __('exercises/1_22.description.4') }}
<code>n</code>
{{ __('exercises/1_22.description.5') }}
<code>n</code>
{{ __('exercises/1_22.description.6') }}
</p>
<pre><code>(define (timed-prime-test n)
  (newline)
  (display n)
  (start-prime-test n (runtime)))
(define (start-prime-test n start-time)
  (if (prime? n)
      (report-prime (- (runtime) start-time))))
(define (report-prime elapsed-time)
  (display " *** ")
  (display elapsed-time))
</code></pre>
<p>{{ __('exercises/1_22.description.7') }}
<code>search-for-primes</code>
{{ __('exercises/1_22.description.8') }}
</p>
