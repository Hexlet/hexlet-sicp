<p>{{ __('exercises/5_1.description') }}</p>
<pre><code>(define (factorial n)
  (define (iter product counter)
    (if (> counter n)
          product
          (iter (* counter product)
                (+ counter 1))))
  (iter 1 1))</code></pre>
