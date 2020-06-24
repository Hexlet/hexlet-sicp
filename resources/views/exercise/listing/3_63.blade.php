<p>{{ __('exercises/3_63.description.1') }}</p>
<pre><code>(define (sqrt-stream x)
  (cons-stream 1.0
               (stream-map (lambda (guess)
                             (sqrt-improve guess x))
                           (sqrt-stream x))))
</code></pre>
<p>{{ __('exercises/3_63.description.2') }}</p>
