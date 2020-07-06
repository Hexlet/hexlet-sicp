<p>{{ __('exercises/4_15.description.1') }}</p>
<pre><code>(define (run-forever) (run-forever))

(define (try p)
  (if (halts? p p)
      (run-forever)
      'halted))</code></pre>
<p>{{ __('exercises/4_15.description.2') }}</p>
