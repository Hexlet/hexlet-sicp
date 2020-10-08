<p>{{ __('exercises/1_22.description.1') }}</p>
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
<p>{{ __('exercises/1_22.description.2') }}</p>
