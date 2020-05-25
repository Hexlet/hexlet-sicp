<p>{{ __('exercises/2_6.description.1') }}</p>
<pre><code>(define zero (lambda (f) (lambda (x) x)))

(define (add-1 n)
  (lambda (f) (lambda (x) (f ((n f) x)))))
</code></pre>
<p>{{ __('exercises/2_6.description.2') }}</p>
<p>{{ __('exercises/2_6.description.3') }}</p>
