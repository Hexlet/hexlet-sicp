<p>{{ __('exercises/3_77.description.1') }}</p>
<pre><code>(define (integral integrand initial-value dt)
  (cons-stream initial-value
               (if (stream-null? integrand)
                   the-empty-stream
                   (integral (stream-cdr integrand)
                             (+ (* dt (stream-car integrand))
                                initial-value)
                             dt))))
</code></pre>
<p>{{ __('exercises/3_77.description.2') }}</p>
