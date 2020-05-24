<p>{{ __('exercises/2_4.description.1') }}</p>
<pre><code>(define (cons x y)
  (lambda (m) (m x y)))

(define (car z)
  (z (lambda (p q) p)))
</code></pre>
<p>{{ __('exercises/2_4.description.2') }}</p>
